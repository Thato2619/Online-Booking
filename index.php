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
//$faceMaskData = $faceMaskDao->readAll();

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
    
    <title>Glistening Glow</title>
   
    <h1>Glistening Glow</h1>
    <section>
    <div cla>

    </div>
    </section>
    
  </head>
  <body>
   
  </body>
</html>
<!-- all credits from images from pexel
Photo by Anna Nekrashevich: https://www.pexels.com/photo/close-up-shot-of-cosmetic-products-8533265/
Photo by Angela Roma : https://www.pexels.com/photo/gentle-black-woman-applying-cream-on-face-7479816/
 -->