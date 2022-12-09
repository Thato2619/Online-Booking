<?php 
//include files from model and config folder
require_once __DIR__ . "/../model/FaceMask.php";
require_once __DIR__ . "/../config/DBConfig.php";


class FaceMaskDao {

    //fields 
    private DBConfig $DBConfig;
    private $table = $FaceMask_products;

    public function __construct()
    {
        $this->DBConfig = $DBConfig;
    }

    //these are methods
    //create facemask products
    public function createFaceMask(FaceMask $faceMask) {

        //add connection bewteen database and facemask product
        $connect =$this->DBConfig = $DBConfig;
        
        //see SQL statement
        $sqlStmt = "INSERT INTO FaceMask_products (ID, Name, Description, Price, Image, Availability)" . "VALUES(
            '".$faceMask->getID()."',
            '".$faceMask->getName()."',
            '".$faceMask->getDescription()."',
            '".$faceMask->getPrice()."',
            '".$faceMask->getImage()."',
            '".$faceMask->getAvailability()."')";

        //send in request 
        if($result = $connect->query($sqlStmt)) {

            $connect->close();
            return $result; //whether the result returns true or false
        } else {
            //use die funcion to kill any connection that may result to error in database
            die("connection error:" . $connect->error);
        }
    }
    
    //update all items in the FaceMask_products 
    public function update(FaceMask $faceMask) {

        $conn = $this->databaseConfig->connect();

        $statement = "UPDATE FaceMask_products
                      SET Name = '".$faceMask->getName()."',
                          Description = '".$faceMask->getDescription()."',
                          Price = '".$faceMask->getPrice()."',
                          Image = '".$faceMask->getImage()."',
                          Availability = '".$availability->getAvailability()."',
                      WHERE ID='".$car->getId()."'
        ";

        if ($result = $conn->query($statement)) {

            $conn->close();
            return $result;

        } else {

            die($conn->error); //die function to close connection in case of error
            $conn->close();
         
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
         $connect = $this->DBConfig = $DBConfig;

         $faceMaskData = [];

         //see SQL statement
        $sqlStmt = "SELECT * FROM  FaceMask_products";

        //use while-loop to loop over array of facemask data
        if($result = $connect->query($sqlStmt)) {
            while($row = $result->fetch_object()) {
                $faceMaskObj = FaceMask ::newFaceMaskFromDB($row);
                array_push($faceMaskData, $faceMaskObj);
            }
            $connect->close();
            return $faceMaskData;
        } else {
            die($connect->error. "<br><br>"); //die function will cancel/kill any error that is not meant to be used, just in case
            $connect->close(); //close all connection
        }

    }
    //delete facemask products with corresponding ID
    function deleteById($DBConfig, $ID) {
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
    


