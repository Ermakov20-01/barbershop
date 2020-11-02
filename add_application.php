<?php

require_once 'Cart.php';
require_once 'pdo.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$date = date('l jS \of F Y h:i:s A');
$cart = new Cart();

$pdo->query('INSERT INTO `applications` (`name`, `phone`, `date`, `accept`) VALUES ("'.$name.'", "'.$phone.'", "'.$date.'", 0)');
$lastid = $pdo->lastInsertId();

foreach ($cart->cart as $key => $value)
{
    $pdo->query('INSERT INTO `application_service` (`application_id`, `service_id`) VALUES ("'.$lastid.'", "'.$key.'")');
}

echo 'Ваша заявка отправлена!';
echo '<br>';
echo '<a href="/">Вернуться назад</a>';

