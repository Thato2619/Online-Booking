<?php 

# error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#add sessiion and include files and sessions
require_once __DIR__ . "/config/DBConfig.php";
require_once __DIR__ . "/data/FaceMaskDao.php";
require_once __DIR__ . "/model/FaceMask.php";

session_start();

#  add FaceMaskDao and Database objects
$dbConfig = new DBConfig();
$faceMaskDao = new FaceMaskDao($dbConfig);


#load facemask data from database
$faceMaskData = $faceMaskDao->readAll($dbConfig);

#create outOfStock handler using sessions
if (isset($_SESSION['outOfStock']) && $_SESSION['outOfStock'] == true) {

    echo "
    <script>
        alert('There seems  that the faemask product that you are looking to purchase is out of stock)
    </script>
    
    ";

    unset($_SESSION['outOfStock']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glistening-Glow</title>
</head>
<body>
    
</body>
</html>