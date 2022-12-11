<?php 
    // includes and session
    require_once __DIR__ . "/model/FaceMask.php";
    require_once __DIR__ . "/data/FaceMaskDao2.php";
    require_once __DIR__ . "/config/DBConfig.php";
    include_once __DIR__ . "/include/data.inc.php";

    session_start();
    
    $connect = mysqli_connect("localhost", "root", "online_store");
    //create session for add_cart and cart
    if(isset($_POST['add_to_cart'])) {
        if(isset($_SESSION['cart'])) {
            $session_aray_name = array_column($_SESSION['cart'], "name");
        }else{
            $session_array = array(
                "id" => $_GET['id'],
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity'],

            );
        }
    

    }
    //create cart session to preview
    //initialise cart if not set 
    if(!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = $facemaskItems;

      //unset quantity
      unset($_SESSION['qty_array']);
    }








?>