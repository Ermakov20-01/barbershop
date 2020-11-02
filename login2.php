<?php
session_start();

$login=$_POST['login'];
$password=$_POST['password'];

if ($login == "admin" && $password == "admin") {
    $_SESSION['auth'] = $login;
    header('Location: index.php');
} else {
    echo ("Пользователь не найден");
}