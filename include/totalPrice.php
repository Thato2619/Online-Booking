<?php 

function totalPrice() {
    //create function to add total price of product items

    $_SESSION['subTotal'] = $_POST['selectedItemValue'] + $_SESSION['subTotal'];
}


?>