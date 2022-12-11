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

//buy the facemask
if(isset($_POST['buyFaceMask'])) {
    //result of saved facemask to be saved in 
    $result = $_SESSION['previewedMask']->faceMaskSell();
    $faceMaskDao->updateSellFaceMask($_SESSION['previewFaceMask']);

    if($result) {
        //lead customer to checkout page with total amount
        header("Location:./checkout.php");
    } else {
        //lead customer back to index.php
        $_SESSION['outOfStock'] = true;

        header("Location:./../index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $previewedMask->getName(). " ". $previewedMask->getDescription() ?></title> <!---- maybe add bootstrap card here, even link cdn links ----->
</head>
<body>
    <div class="card-item">

        <?php 
        echo "
        <img src='" . $previewedMask->getImage() . "' alt='thumb' width=350 height=200>
        <ul>
            <li>".$previewedMask->getName()."</li>
            <li>".$previewedMask->getDescription()."</li>
            <li>".$previewedMask->getPrice()."</li>
            <li>".$previewedMask->getImage()."</li>
            <li>".$previewedMask->getAvailabilty()."</li>
        </ul>
        <form '".$_SERVER['PHP_SELF']."' method='post'>
            <input type='hidden' name='faceMaskID' value='".$previewedMask->getID()."'>
            <button type='submit' name='buyFaceMask' value='true'>BUY</button>
        </form>
        
        ";
        
        
        ?>
    </div>
</body>
</html>