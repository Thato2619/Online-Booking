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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1>WELCOME</h1>
        <nav class="navbar navbar-expand-lg bg-light">

        <!------- Navbar ------->
        
    <div class="container-fluid">
        <a class="navbar-brand" href="#">GLISTENING GLOW</a>
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

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>

    <!------- Product items with cards ------->
    <div class="card" style="width: 18rem;">
  <img src="./static/Images/Ala-Rasi.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Ala Rasi</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <img src="./static/Images/Hygge.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Hygge</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <img src="./static/Images/Eudaimonia.jpeg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Eudaimonia</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
<!-- all credits from images from pexel
Photo by Anna Nekrashevich: https://www.pexels.com/photo/close-up-shot-of-cosmetic-products-8533265/
Photo by Angela Roma : https://www.pexels.com/photo/gentle-black-woman-applying-cream-on-face-7479816/
 -->