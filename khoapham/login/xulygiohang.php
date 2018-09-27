<?php
    include 'arrSP.php';
    session_start();
    if (isset($_POST['productID'])) {
        $productID = $_POST['productID'];
        if ( isset( $_COOKIE['productIDS'] ) ){
            $product_ids = $_COOKIE['productIDS'];
            $product_ids .= ',' . $productID;
            setcookie('productIDS', $product_ids, time() + 1200);
        } else {
            setcookie('productIDS', $productID, time() + 1200);
        }
    }
    header('Location: home.php');
?>