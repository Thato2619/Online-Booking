<?php 
    // includes and session
    require_once __DIR__ . "/model/FaceMask.php";
    require_once __DIR__ . "/data/FaceMaskDao2.php";
    require_once __DIR__ . "/config/DBConfig.php";
    include_once __DIR__ . "/include/data.inc.php";

    session_start();
    
    //create cart session to preview
    //initialise cart if not set 
    if(!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = $facemaskItems;

      //unset quantity
      unset($_SESSION['qty_array']);
    }








?>