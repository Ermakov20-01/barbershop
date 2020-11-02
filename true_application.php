<?php

require_once 'pdo.php';

$pdo->query('UPDATE `applications` SET `accept` = 1 WHERE `applications`.`id` = '.$_GET['id'].'');
header('Location: /');
?>