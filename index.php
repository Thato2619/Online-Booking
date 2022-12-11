<?php




    // error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    
    

    // includes and session
    require_once __DIR__ . "/model/FaceMask.php";
    require_once __DIR__ . "/data/FaceMaskDao2.php";
    require_once __DIR__ . "/config/DBConfig.php";
    include_once __DIR__ . "/include/data.inc.php";

    session_start();
    
    //create cart session to preview
    //initialise cart if not set 
    if(!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = $facemaskItems;

      //unset quantity
      unset($_SESSION['qty_array']);
    }

    //create database object and facemaskdao object
    $dbConfig = new DBConfig();
    $faceMaskDao = new FaskMaskDao($dbConfig);


  $faceMaskData = $faceMaskDao->readAll();

    // this handles out of stock handler request
    if (isset($_SESSION['outOfStock']) && $_SESSION['outOfStock'] == true ) {

        echo "
            <script>
                alert('Unfortuntely we are running low on stock');
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
    <title>Glistening Glowt</title>
    <link rel="stylesheet" href="./static/CSS/styles.css">
</head>
<body>
    <hr>
    <h1>
      GLISTENING GLOW
    </h1>
    
    <hr>
    
    <h5>The place where your skin feels at home</h5>

    <hr>

    <section>
        <div class="items">
            <?php
                foreach ($faceMaskData as $i => $FaceMask_products) {
                    echo "
                        <div class='item'>
                            <h3>
                                FACEMASK PRODUCTS: " . ($i + 1). "
                            </h3>
                            <ul>
                                <li>". $FaceMask_products->getName() . "</li>
                                <li>". $FaceMask_products->getDescription() . "</li>
                                <li>R".$FaceMask_products->getPrice() . "</li>
                                ". $FaceMask_products->getAvailability() . "
                            </ul>
                            <form action='./view/preview.php' method='get'>
                                <input type='hidden' name='carId' value='" . $FaceMask_products->getId() . "'>
                                <button type='submit' name='viewCar' value='true'>View Car</button>
                            </form>
                        </div>
                    ";
                }
            ?>
        </div>
    </section>

</body>
</html>