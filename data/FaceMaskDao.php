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
            '".$FaceMask->getAvailability()."',
        );

    }
}













?>