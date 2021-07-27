<?php
class Config
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'concert_information_db';
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->db_name);

        return $this->conn;
    }
}
?>