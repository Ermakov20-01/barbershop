<?php

require_once 'Cart.php';
$cart = new Cart();
$cart->addproduct($_GET['id']);
header('Location: /');
?>