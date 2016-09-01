<?php
require_once "inc/initial.php";

if ($_SESSION['user']) {
    unset ($_SESSION['user']);

    $_SESSION['notification']['status'] = 'warning';
    $_SESSION['notification']['title'] = 'До свидания: ';
    $_SESSION['notification']['message'] = 'Вы вышли из своей учетной записи. Для продолжения работы введите данные своей учетной записи.';
}

header('Location: http://' . get_base_url() . '/login.php');
?>