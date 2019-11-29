<?php
// TO ENSURE NO SESSION ERRORS
error_reporting(E_ALL);
// OPEN SESSION
session_start();

// CREATE CART ARRAY
$_SESSION['cart'][] = $_POST;
?>

<!DOCTYPE html>
<html>

<!-- MODULE FOR HEAD -->
    <?php include_once('head.php'); ?>
    <body>
    <?php include_once('nav.php'); ?>
    
    <main>
     
     <!-- BUTTONS TO SUBMIT TO CART OR MAKE ANOTHER BOOKING --> 
    <form action="showing.php" class='default'>
        <p><button class='buttons' type='submit' value='submit'>make another booking</button></p>
    </form>
    <form action="cart.php" class='default'>
        <p><button class='buttons' type='submit' value='submit'>proceed to cart</button></p>
    </form>
    <!-- MODULE FOR FOOTER -->
    <?php include_once('footer.php'); ?>   
    
    </main>


</html>