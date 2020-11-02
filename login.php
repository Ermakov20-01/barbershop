<?php
session_start();


if(isset($_SESSION['auth']))
{
    header('Location: index.php');
}

?>


<h4>Авторизация</h4>
<p>Если вы админ вы должны знать логин и пароль</p>
<form method="post" action="login2.php">
    <input type="text" name="login" placeholder="Введите логин">
    <input type="password" name="password" placeholder="Введите пароль">
    <input type="submit" value="Авторизоваться">
</form>


