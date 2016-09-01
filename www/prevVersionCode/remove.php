<?php
require_once "inc/not_login.php";
require_once "inc/initial.php";

if ($_GET['id']) {
    $id = $_GET['id'];

    $query = "DELETE FROM pol_clients WHERE id = (" . $id . ");";

    if ($result = $db->query($query)) {
        $_SESSION['notification']['status'] = 'success';
        $_SESSION['notification']['title'] = 'Поздравляю: ';
        $_SESSION['notification']['message'] = 'Клиент с ID ' . $id . ' успешно удален';
    } else {
        $_SESSION['notification']['status'] = 'danger';
        $_SESSION['notification']['title'] = 'Ошибка: ';
        $_SESSION['notification']['message'] = 'Не удалось удалить клиента с ID ' .$id;
    }
} else {
    $_SESSION['notification']['status'] = 'danger';
    $_SESSION['notification']['title'] = 'Ошибка: ';
    $_SESSION['notification']['message'] = 'Вы не выбрали клиента для удаления';
}

header('Location: http://' . get_base_url());