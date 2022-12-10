<?php


require_once __DIR__ . "/../config/DBConfig.php";
require_once __DIR__ . "/../model/FaceMask.php";


class FaskMaskDao {

    // ======= Fields =======

    private DBConfig $dbConfig;
    private $tableName = "FaceMask_products";

    // ===== Constructor =====

    public function __construct($dbConfig) {
        
        $this->dbConfig = $dbConfig;
        
    }

    // ===== Methods ====

    // =================================== create new car ===================================
    public function create(FaceMask $FaceMask_products) {

        $connect = $this->dbConfig->connectToDatabse();

        $sqlStatement = "INSERT INTO FaceMask_products (Name, Description, Price, Image, Availablilty) Values(
            '". $FaceMask_products->getName() ."', 
            '". $FaceMask_products->getDescription() ."', 
            '". $FaceMask_products->getPrice() ."', 
            '". $FaceMask_products->getImage() ."', 
            '". $FaceMask_products->getAvailability() ."'
        )";

        //send in request
        if ($result = $connect->query($sqlStatement)) {

            
            $connect->close();
            return $result; //whether the result returns true or false
   
        } else {

            die("Connection failed: " . $connect->error); //die function to close connection in case of error
            $connect->close();

        }
    }

    // =================================== Read all cars from database ===================================
    public function readAll() {

        $connect = $this->dbConfig->connectToDatabse();

        $faceMaskData = [];

        $sqlStatement = "SELECT * FROM FaceMask_products";

        if ($result = $connect->query($sqlStatement)) {

            while ($row = $result->fetch_object()) {

                $faceMaskObject = FaceMask::newFaceMaskFromDB($row);

                array_push($faceMaskData, $faceMaskObject);
            }

            //send in request
            $connect->close();
            return $faceMaskData; //whether the result returns true or false

        } else {

            die($connect->error . "<br><br>"); //die function to close connection in case of error
            $connect->close(); // close connection
            
        }

    }


    // laod car by id 
    public function readById($ID) {

        $connect = $this->dbConfig->connectToDatabse();

        $sqlStatement = "SELECT * FROM FaceMask_products WHERE ID='$ID'";

        if ($result = $connect->query($sqlStatement)) {

            $row = $result->fetch_object();

            //send in request
            if ($row !== null) {
                
                $FaceMask_products = FaceMask::newFaceMaskFromDB($row);
                $connect->close();
                return $FaceMask_products; //whether the result returns true or false
            }

        } else {

            $connect->close();
            die("Connection failed: " . $connect->error); //die function to close connection in case of error
        }
    }

    //  update whole car 
    public function update(FaceMask $FaceMask_products) {

        $connect = $this->dbConfig->connectToDatabse();

        $sqlStatement = "UPDATE FaceMask_products
                      SET Name = '".$FaceMask_products->getName()."',
                          Description = '".$FaceMask_products->getDescription()."',
                          Price = '".$FaceMask_products->getPrice()."',
                          Image = '".$FaceMask_products->getImage()."',
                         Availabilty = '".$FaceMask_products->getAvailability()."'
                      WHERE ID='".$FaceMask_products->getId()."'
        ";

        //send in request
        if ($result = $connect->query($sqlStatement)) {

            $connect->close();
            return $result; //whether the result returns true or false

        } else {

            die($connect->error); //die function to close connection in case of error
            $connect->close();
         
        }
    }

    // sets available column to 0 
    public function updateSellFaceMask(FaceMask $FaceMask_products) {
        
        $connect = $this->dbConfig->connectToDatabse();

        $sqlStatement = "UPDATE FaceMask_products SET Availablilty = '0' WHERE ID='".$FaceMask_products->getId()."'
        ";

        //send in request
        if ($result = $connect->query($sqlStatement)) {

            $connect->close();
            return $result; //whether the result returns true or false

        } else {

            die($connect->error); //die function to close connection in case of error
            $connect->close();
         
        }
    }

    // deletes a car by id   
    public function deleteById(FaceMask $FaceMask_products){
        $connect = $dbConfig->connectToDatabase();

        //delete from the ID of the from the facemask id
         //see SQL statement
         $sqlStatement = "DELETE FROM  FaceMask_products WHERE ID=$ID";

         //send in request
         if($result = $connect->query($sqlStatement)) {
             $connect->close(); //whether the result returns true or false
             return $result;
         } else {
             die("Connection failed: " . $connect->error);  //die function will cancel/kill any error that is not meant to be used, just in case
         }
    }

}