<?php 

  // error reporting
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // require files
  require_once __DIR__ . "/../model/FaceMask.php";
  require_once __DIR__ . "/../data/FaceMaskDao2.php";

session_start();

$dbConfig = new DBConfig();
$faceMaskDao = new FaskMaskDao($dbConfig);


$faceMaskData = $faceMaskDao->readAll();

//request handling on view facemask product
if(isset($_GET['previewFaceMask'])) {
    //load facemask product by using FaceMaskDAO class(get it by ID)
    $_SESSION['previewedMask'] = $faceMaskDao->readById($_GET['faceMaskID']);
    $previewedMask = $_SESSION['previewedMask'];
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
    <h1> hello </h1>
</body>
</html>