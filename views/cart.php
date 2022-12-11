<?php
// includes and session
require_once __DIR__ . "/model/FaceMask.php";
require_once __DIR__ . "/data/FaceMaskDao2.php";
require_once __DIR__ . "/config/DBConfig.php";
include_once __DIR__ . "/include/data.inc.php";

session_start();

$connect = mysqli_connect("localhost", "root", "online_store");
//create session for add_cart and cart
if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])) {
        $session_aray_name = array_column($_SESSION['cart'], "name");

        if (!in_array($_GET['name'], $session_aray_name)) {
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
    <title>Cart</title>
</head>

<body>
    <h2>Chosen Items</h2>

    <div>
        <!---create table using info from backend --->
        <?php
        $output .= "
    <table class= 'table table-bordered tavle-striped'>
    <tr>
    <th?>Name</th>
    <th?>Price</th>
    <th?>Quantity Itek</th>
    <th?>Total Price</th>
    <th?>Action/th>
    </tr>
    ";

        if (!empty($_SESSION['cart'])) {

            foreach ($_SESSION['cart'] as $key->$value) {

                $output .= "
            <tr>
            <td>" . $value['id'] . "</td>
            <td>" . $value['name'] . "</td>
            <td>" . $value['price'] . "</td>
            <td>" . $value['quantity'] . "</td>
            <td>$" . number_format($value['price'] * $value['quantity']);
                "</td>
                <a href = 'index.php?action = remove&id=" . $value['id'];
                " '>Remove</a>
                <button>
            </tr>
            ";

                //create method to make  totalprice of all items
                $total = $total + $value['quantity'] * $value['price'];
            }

            $output .= "
            <tr>
            <td colspan='3'></td>
            <td><b>Total Price<b></td>
            <td>" . number_format($total, 2) . "</td>
            <td>
            <!----create function to button to clear all ----->
                <a href='index.php?action=clearAll'>
                <button>Clear All</button>
                </a>
            </td>
            </tr>

            ";

            echo $output;
        }




        ?>


    </div>

    <?php 
    //create output of the functionality if user wants to remove or clear items
    
    if ($_GET[' action'] == "clearall") {
        unset($_SESSION['cart']);
    }

    if($_GET['action'] == "remove") {

        foreach ($_SESSION['cart'] as $key -> $value) {
            if ($value['name'] == $_GET['name']) {
                unset($_SESSION['cart'][$key]);
                
            }
        }
    }

    
    
    
    
    ?>

</body>

</html>