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

            if(!in_array($_GET['name'], $session_aray_name)){
                $session_array = array(
                    "id" => $_GET['id'],
                    "name" => $_POST['name'],
                    "price" => $_POST['price'],
                    "quantity" => $_POST['quantity'],
                );
                $_SESSION['cart'][] = $session_array;
            }
        }
            
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>