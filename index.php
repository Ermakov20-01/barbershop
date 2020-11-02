<?php
session_start();
require_once 'pdo.php';
require_once 'Cart.php';

$services = $pdo->query('SELECT * FROM `services`');
$applications = $pdo->query('SELECT * FROM `applications`');

$cart = new Cart();


foreach ($services as $service) {
    echo $service['name'] . " : ";

    echo $service['price'] . " руб: ";

    if ($cart->cart[$service['id']]>0){
        echo '<a href="del_card.php?id='.$service['id'].'">Удалить с корзины</a>';
    }
    else {

        echo '<a href="add_card.php?id='.$service['id'].'">Добавить в корзину</a>';
    }
    echo '<br>';
}

?>

<h3> Барбершоп выбор услуги</h3>
<form action="add_application.php" method="post">
    <input name="name" placeholder="Введите Имя">
    <input name="phone" placeholder="Введите Телефон">
    <input type="submit" value="Отправить">
</form>

<?php
    if(isset($_SESSION['auth']))
    {
        echo 'Вы авторизованны';

        echo "<p>Админ панель</p>";
        foreach ($applications as $application) {

            $application_services = $pdo->query('SELECT * FROM `application_service` WHERE application_id = '.$application['id'].'')->fetchAll();
            echo "Код: " . $application['id'] . "<br>";
            echo "Имя: " . $application['name'] . "<br>";
            echo "Телефон: " . $application['phone'] . "<br>";
            echo "Дата: " . $application['date'] . "<br>";
            echo "Услуги: <br>";
            foreach ($application_services as $application_service) {
                $service = $pdo->query('SELECT * FROM `services` WHERE id = '.$application_service['service_id'].'')->fetch();
                echo '-'.$service['name'] . " : " . $service['price'] . ' руб.<br>';
            }
            if ($application['accept'] == 0) {
                echo "Статус: Не подтверждена<br>";
            } else {
                echo "Статус: Подтверждена<br>";
            }
            if ($application['accept'] == 0) {
                echo '<a href="true_application.php?id='.$application['id'].'">Подтвердить</a>';
            }

            echo '<br>';
            echo '<br>';
        }

    } else {
        echo '<a href="login.php">Авторизация</a>';
    }



?>

