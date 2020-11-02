<?php

require_once 'Cart.php';
$cart = new Cart();
$cart->delProduct($_GET['id']);
header('Location: /');
?>