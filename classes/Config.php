<?php
class Config
{
    private $servername = 'us-cdbr-east-04.cleardb.com';
    private $username = 'be3c38f7a9103f';
    private $password = '03d84b5f';
    private $db_name = 'heroku_e6f7a2138fd4542';
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->db_name);

        return $this->conn;
    }
}
?>