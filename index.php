<?php 
session_start();
# error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#add sessiion and include files and sessions
require_once __DIR__ . "/config/DBConfig.php";
require_once __DIR__ . "/data/FaceMaskDao.php";
require_once __DIR__ . "/model/FaceMask.php";
require_once __DIR__ . "/data/FaceMaskDao2.php";
include_once __DIR__ ."/include/data.inc.php";



#  add FaceMaskDao and Database objects
$dbConfig = new DBConfig();
$faceMaskDao = new FaceMaskDao($dbConfig);


#load facemask data from database
//$faceMaskData = $faceMaskDao->readAll();
//$facemaskItems = [];

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <!----- Navbar------>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        >
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

 <!----- add three cards from bootstrap------>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<!-- all credits from images from pexel
Photo by Anna Nekrashevich: https://www.pexels.com/photo/close-up-shot-of-cosmetic-products-8533265/
Photo by Angela Roma : https://www.pexels.com/photo/gentle-black-woman-applying-cream-on-face-7479816/
 -->