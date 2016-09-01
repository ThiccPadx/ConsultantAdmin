<?php
require_once "initial.php";
if (!$_SESSION['user']) {
    header('Location: http://' . get_base_url() . '/login.php');
}
?>