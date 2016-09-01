<?php
$db_host = "sichena.mysql.ukraine.com.ua";
$db_name = "sichena_poland";
$db_login = "sichena_poland";
$db_password = "qybbc7ba";

$db = new mysqli($db_host, $db_login, $db_password, $db_name);
if($db->connect_errno) {
    echo "DB error \n";
}
$db->set_charset('utf8');