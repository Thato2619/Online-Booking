<?php 
//include files from model and config folder
require_once __DIR__ . "/../model/FaceMask.php";
#require_once __DIR__ . "/../config/DBConfig.php";


class FaceMaskDao {
    //create facemask products
    public function createFaceMask($DBConfig, $FaceMask) {

        //add connection bewteen database and facemask product
        $connect = $DBConfig->connectToDatabase();
        
        //see SQL statement
        $sqlStmt = "INSERT INTO FaceMask_products (ID, Name, Description, Price, Image, Availability)" . "VALUES(
            '".$FaceMask->getID()."',
            '".$FaceMask->getName()."',
            '".$FaceMask->getDescription()."',
            '".$FaceMask->getPrice()."',
            '".$FaceMask->getImage()."',
            '".$FaceMask->getAvailability()."')";

        //send in request 
        if($result = $connect->query($sqlStmt)) {

            $connect->close();
            return $result; //whether the result returns true or false
        } else {
            //use die funcion to kill any connection that may result to error in database
            die("connection error:" . $connect->error);
        }
    }
    
    //readbyID(all facemask products)
    public function readById($DBConfig, $ID) {
        //add connection bewteen database and facemask product
        $connect = $DBConfig->connectToDatabase();

        //see SQL statement
        $sqlStmt = "SELECT * FROM FaceMask_products WHERE ID = $ID";
        
    }
    

}
        















?>