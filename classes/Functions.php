<?php
session_start();
include  'Config.php';
class Functions extends Config
{
    public function create_login($username,$password)
    {
        // $hash_password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO login(username,password)VALUES('$username','$password')";
        $result = $this->conn->query($sql);

        if($result == TRUE)
        {
            return TRUE;
        }
        else
        {
            die('ERROR: '.$this->conn->error);
        }
    }

    public function create_user($fname,$lname,$c_num,$address,$profilepic)
    {
        $loginId = $this->conn->insert_id;
        $sql = "INSERT INTO users(fname,lname,contact_number,address,login_id,file_name)VALUES('$fname','$lname','$c_num','$address','$loginId','$profilepic')";

        if($this->conn->query($sql))
        {
            return 1;
        }
        else
        { 
            echo $this->conn->errpr;
            return 0;
        }

    }

    public function login($uname,$pword)
    {
        $sql = "SELECT * FROM login INNER JOIN users ON login.login_id = users.login_id WHERE login.username = '$uname' AND login.password = '$pword'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
          
                if($row['status']== 'U')
                {
                    $_SESSION['id'] = $row['user_id'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['file_name'] = $row['file_name'];
                    $_SESSION['status'] = $row['status'];

                    header('location:user_dashboard.php');
                }
                else
                {
                    $_SESSION['id'] = $row['user_id'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['file_name'] = $row['file_name'];
                    $_SESSION['status'] = $row['status'];

                    header('location:admin_dashboard.php');
                }
        }
        else
        {
            die('ERROR: '.$this->conn->error);
        }  
    }

     public function add_post($concert_name,$date,$opening_time,$hall,$artists,$program,$ticket,$contact,$pic,$user_id)
     {
        
        
        $sql= "INSERT INTO post(concert_name,date,opening_time,hall,artists,program,ticket,contact,file_name,user_id)VALUES('$concert_name','$date','$opening_time','$hall','$artists','$program','$ticket','$contact','$pic','$user_id')";

        if($this->conn->query($sql))
        {
            return 1;
        }
        else
        {
            echo "Not saved " .$this->conn->error;
            return 0;
        }
     }
        
     public function get_post_admin($user_id)
     {
        $sql = "SELECT post_id,concert_name, date, opening_time, hall, artists, program FROM post WHERE user_id=".$user_id;
        $result = $this->conn->query($sql);

        if($result->num_rows >0)
        {
            $arr = array();
            while($row = $result->fetch_assoc())
            {
                $arr[] = $row;
            }
            return $arr;
        }
        else{
            return FALSE;
        }
     }

     public function get_post_details($post_id)
     {
        $sql = "SELECT concert_name, date, opening_time, hall, artists, program, ticket, contact, file_name FROM post WHERE post_id=".$post_id;
        $result = $this->conn->query($sql);

        if($result->num_rows ==1)
        {
            return $result->fetch_assoc();
        }
        else
        {
            return false;

        }
     }

     public function update_post($concert_name,$date,$opening_time,$hall,$artists,$program,$ticket,$contact,$pic,$post_id)
     {
        $sql= "UPDATE post SET concert_name = '$concert_name', date = '$date', opening_time = '$opening_time', hall = '$hall',artists = '$artists', program = '$program', ticket = '$ticket', contact = '$contact', file_name = '$pic' WHERE post_id = '$post_id' ";

        if($this->conn->query($sql))
        {
            return 1;
        }
        else
        {
            echo "Not saved " .$this->conn->error;
            return 0;
            
        }
     }

     public function delete_post($post_id)
     {
         $sql= "DELETE FROM post WHERE post_id = $post_id";
         $result = $this->conn->query($sql);
        if($result)
        {
            header("Location:admin_post.php?success=1&message=The post has been deleted successfully.");
        }
        else
        {
            "The operation failed. Kindly try again " .$this->conn->error;
        }
     }

     public function get_post_user()
     {
        $sql = "SELECT post_id,concert_name, date, opening_time, hall, artists, program, file_name FROM post ORDER BY `post`.`date` ASC";
        $result = $this->conn->query($sql);

        if($result->num_rows >0)
        {
            $arr = array();
            while($row = $result->fetch_assoc())
            {
                $arr[] = $row;
            }
            return $arr;
        }
        else
        {
            return FALSE;
        }
    
     }

     public function get_post_hall_user()
     {
        $sql = "SELECT hall FROM post ORDER BY `post`.`hall` ASC";
        $result = $this->conn->query($sql);

        if($result->num_rows >0)
        {
            $arr = array();
            while($row = $result->fetch_assoc())
            {
                $arr[] = $row;
            }
            return $arr;
        }
        else
        {
            return FALSE;
        }
    
     }

     public function get_profile($user_id)
     {
        $sql = "SELECT address, contact_number FROM users WHERE user_id=".$user_id;
        $result = $this->conn->query($sql);
        if($result->num_rows ==1)
        {
            return $result->fetch_assoc();
        }
        else{
            return FALSE;
        }
     }

     public function update_profile($fname,$lname,$c_number,$address,$pic,$uname,$user_id,$password)
     {
        if($this->isCurrentPassword($user_id,$password))
        {
            $sql = "UPDATE users INNER JOIN login ON users.login_id = login.login_id SET users.fname = '$fname', users.lname = '$lname', users.contact_number = '$c_number', users.address = '$address', users.file_name = '$pic', login.username = '$uname' WHERE users.user_id = $user_id";
            $result = $this->conn->query($sql);
            if($result)
            {
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['username'] = $uname;
                $_SESSION['file_name'] = $pic;

                return 1;
            }
            else
            {
                echo "Not saved" .$this->conn->error;
                return 0;
            }
        }
        else
        {
            echo "Incorrect password" .$this->conn->error;
            return 0;
        }
     }

     public function isCurrentPassword($user_id,$currentPassword)
     {
        $sql = "SELECT * FROM users INNER JOIN login ON users.login_id = login.login_id WHERE users.user_id = '$user_id' AND login.password = '$currentPassword'";

        $result = $this->conn->query($sql);
        if($result->num_rows == 1)
        {
            return $result->fetch_assoc();
            
        }
        else
        {
            return FALSE;
        }  
     }

     public function updatePassword($user_id,$currentPassword,$newPassword1,$newPassword2)
     {
        if($this->isCurrentPassword($user_id,$currentPassword))
        {
            if($newPassword1 == $newPassword2)
            {
                $sql = "UPDATE login INNER JOIN users ON users.login_id = login.login_id SET login.password = '$newPassword1' WHERE users.user_id = $user_id";
                $result = $this->conn->query($sql);

                if($result)
                {
                    if($_SESSION['status'] == 'U')
                    {
                        header("Location:profile_user.php?success=1&message=The password is successfully updated.");
                    }
                    else
                    {
                        header("Location:profile_admin.php?success=1&message=The password is successfully updated.");
                    }
                }
                else
                {
                    die('The operation failed. Kindly try again: '.$this->conn->error);
                }
            }
            else
            {
                die("The new password doesn't match: ".$this->conn->error);
            }
        }
        else
        {
            die('Current password is incorrect: '.$this->conn->error);

        }
     }

     public function search($keywords)
     {
        $sql = "SELECT * FROM post WHERE concert_name LIKE '%$keywords%' OR artists LIKE '%$keywords%' OR program LIKE '%$keywords%' ORDER BY `post`.`date` ASC";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            return FALSE;
        }
    
     }

     public function date($start,$end)
     {
        $sql = "SELECT * FROM post WHERE date BETWEEN '$start' AND LAST_DAY('$end') ORDER BY `post`.`date` ASC";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            return FALSE;
        }
    
     }

     public function hall($hall)
     {
        $sql = "SELECT * FROM post WHERE hall = '$hall' ORDER BY `post`.`date` ASC";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            return FALSE;
        }
    
     }

     public function favoriteConcert($post_id,$user_id)
     {
         $sql= "INSERT INTO favorite(user_id,post_id)VALUES('$user_id','$post_id') ";

         if($this->conn->query($sql))
        {
            header("Location:profile_user.php?success=1&message=The concert is successfully added in your favorite concerts.");
        }
        else
        {
            return FALSE;
        }
     }

     public function get_favorite_post_user()
     {
        $sql = "SELECT post_id,concert_name, date, opening_time, hall, artists, program, file_name FROM post INNER JOIN favorite ON post.post_id = favorite.post_id  ORDER BY `post`.`date` ASC";
        $result = $this->conn->query($sql);

        if($result->num_rows >0)
        {
            $arr = array();
            while($row = $result->fetch_assoc())
            {
                $arr[] = $row;
            }
            return $arr;
        }
        else
        {
            return FALSE;
        }
    
     }
}     

?>