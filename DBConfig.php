<?php 

//create database class with user, password, db, host & port

class DBConfig {
    private $user = 'root';
    private $password = 'root';
    private $db = 'Online-Store';
    private $host = 'localhost';
    private $port = 8888;

    //create database method to connect to database via local code
    public function connectToDatabse(){
        $mysqli = new \mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->db,
            $this->port
        );

        //check if connection is successful
        if($mysqli->connect_error) {
            die("connection:failed: " . $mysqli->connect_error);

        } else {
            // echo out, "connected sucessfully"
            return $mysqli;
        }
    }
    

}












?>