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

        //send in request
        if($result = $connect->query($sqlStmt)) {
            //only gets single result
            $row = $result->fetch_object(); // returns PHP oject

            if($row !== null) {

                $facemask = FaceMask ::newFaceMaskFromDB($row);
                $connect->close();
                return $facemask; //whether the result returns true or false
            }
        } else {
            die($connect->error); //die function will cancel/kill any error that is not meant to be used, just in case
            $connect->close();
        }

    }

    // update available stock 
    public function updateAvailableStock($DBConfig, $FaceMask ) {
         //add connection bewteen database and facemask product
        $connect = $DBConfig->connectToDatabase();

        //see SQL statement
        $sqlStmt = "UPDATE FaceMask_products SET Availability = '0' WHERE ID='".$FaceMask->getID()."'";

        //send in request
        if($result = $connect->query($sqlStmt)) {
            $connect->close();
            return $result; //whether the result returns true or false
        } else{
            die($connect->error); //die function will cancel/kill any error that is not meant to be used, just in case
            $connect->close(); 

        }

    }

    //read all facemask products 
    public function readAll() {
         //add connection bewteen database and facemask product
         $connect = $DBConfig->connectToDatabase();
    }
    //delete facemask products with corresponding ID
    public function deleteById($DBConfig, $ID) {
         //add connection bewteen database and facemask product
        $connect = $DBConfig->connectToDatabase();

        //delete from the ID of the from the facemask id
         //see SQL statement
         $sqlStmt = "DELETE FROM  FaceMask_products WHERE ID=$ID";

         //send in request
         if($result = $connect->query($sqlStmt)) {
             $connect->close();
             return $result;
         } else {
             die("Connection failed: " . $connect->error);  //die function will cancel/kill any error that is not meant to be used, just in case
         }


    }
    

}
