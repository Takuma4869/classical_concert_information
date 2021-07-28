<?php
include 'classes/Functions.php';
$functions = new Functions;

if(isset($_POST['register'])  && !empty($_POST["fname"])  && !empty($_POST["lname"])  && !empty($_POST["c_number"]) && !empty($_POST["address"])   && !empty($_POST["uname"]) && !empty($_POST["pword"]))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $c_num = $_POST['c_number'];
    $address = $_POST['address'];
    $profilepic = $_FILES['profilepic']['name'];
    $target_dir  = "images/";
    $target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
    $username = $_POST['uname'];
    $password = md5($_POST['pword']);

    $validate = $functions->create_login($username,$password);

    if($validate == TRUE)
    {
        $ans = $functions->create_user($fname,$lname,$c_num,$address,$profilepic);

        if($ans == 1)
        {
            move_uploaded_file($_FILES['profilepic']['tmp_name'],$target_file);

            header('Location:login.php?success=1&message=Sign up successfull.');        }
        else
        {
            die('ERROR: '.$this->conn->error);

        }
    }
}
elseif(isset($_POST['login']))
{
    $uname = $_POST['uname'];
    $pword = md5($_POST['pword']);

    // echo "login button working";


    $functions->login($uname,$pword);

}
elseif(isset($_POST['post']))
{
    $concert_name = $_POST['concert_name'];
    $date = $_POST['date'];
    $opening_time = $_POST['opening_time'];
    $hall = $_POST['hall'];
    $artists = $_POST['artists'];
    $program = $_POST['program'];
    $ticket = $_POST['ticket'];
    $contact = $_POST['contact'];
    $pic = $_FILES['pic']['name'];
    $target_dir  = "images/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    $user_id = $_SESSION['id'];

    $ans = $functions->add_post($concert_name,$date,$opening_time,$hall,$artists,$program,$ticket,$contact,$pic,$user_id);

    if($ans == 1)
    {
        move_uploaded_file($_FILES['pic']['tmp_name'],$target_file);

        header("Location:admin_post.php?success=1&message=The post is successfully added."); 
    }
    else
    {
        die('The application failed to save the post.: '.$this->conn->error);
        
    }

}

elseif(isset($_POST['update_post']))
{
    $concert_name = $_POST['concert_name'];
    $date = $_POST['date'];
    $opening_time = $_POST['opening_time'];
    $hall = $_POST['hall'];
    $artists = $_POST['artists'];
    $program = $_POST['program'];
    $ticket = $_POST['ticket'];
    $contact = $_POST['contact'];
    $pic = $_FILES['post_pic']['name'];
    $target_dir  = "images/";
    $target_file = $target_dir . basename($_FILES["post_pic"]["name"]);
    $post_id = $_POST['post_id'];

    $ans = $functions->update_post($concert_name,$date,$opening_time,$hall,$artists,$program,$ticket,$contact,$pic,$post_id);
    if($ans == 1)
    {
        move_uploaded_file($_FILES['pic']['tmp_name'],$target_file);

        header("Location:admin_post.php?success=1&message=The post is successfully updated."); 
    }
    else
    {
        die('The operation failed. Kindly try again.: '.$this->conn->error);
    }


}

elseif(isset($_POST['update_profile']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $c_number = $_POST['c_number'];
    $address = $_POST['address'];
    $pic = $_FILES['profile_pic']['name'];
    $target_dir  = "images/";
    $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
    $uname = $_POST['uname'];
    $password = md5($_POST['password']);


    $ans = $functions->update_profile($fname,$lname,$c_number,$address,$pic,$uname,$_SESSION["id"],$password);

    if($ans == 1)
    {
        move_uploaded_file($_FILES['profile_pic']['tmp_name'],$target_file);
        if($_SESSION['status'] == 'U')
        {
            header("Location:profile_user.php?success=1&message=The profile is successfully updated.");
        }
        else
        {
            header("Location:profile_admin.php?success=1&message=The profile is successfully updated.");
        }
        
    }
    else
    {
        die('The operation failed. Kindly try again.: '.$this->conn->error);

    }
}

elseif(isset($_POST['save']))
{
    $currentPassword = md5($_POST["currentpassword"]);
    $newPassword1 = md5($_POST["newpassword1"]);
    $newPassword2 = md5($_POST["newpassword2"]);

    $functions->updatePassword($_SESSION["id"],$currentPassword,$newPassword1,$newPassword2);
}

elseif(isset($_POST['search1']))
{
    $searchedConcert = $_POST['searched_concert'];
    // var_dump($searchedConcert,$start,$end);

    $_SESSION['searched_concert'] = $searchedConcert;
    header('location:searchedResult1.php');
}

elseif(isset($_POST['search2']))
{
    $start = $_POST['start'];
    $end = $_POST['end'];
    // var_dump($searchedConcert,$start,$end);

    $_SESSION['start'] = $start;
    $_SESSION['end'] = $end;
    header('location:searchedResult2.php');
}

elseif(isset($_POST['search3']))
{
    $hall = $_POST['hall'];
    var_dump($hall);

    $_SESSION['hall'] = $hall;
    header('location:searchedResult3.php');
}

elseif(isset($_POST['follow']))
{
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['id'];

    $functions->favoriteConcert($post_id,$user_id);
}

?>