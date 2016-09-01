<?php
require_once "inc/not_login.php";
require_once "inc/initial.php";

if ($_POST) {
    $client_id = $_POST['customer_id'];

    $client_data = array();

    $client_data['name'] = $_POST['customer_name'];
    $client_data['surname'] = $_POST['customer_surname'];
    $client_data['status'] = $_POST['customer_status'];
    $client_data['birth_date'] = str_replace('-', '/', $_POST['customer_birth']);
    $client_data['ppva'] = $_POST['customer_ppva'];
    $client_data['purpose'] = $_POST['customer_purpose'];
    $client_data['email'] = $_POST['customer_email'];
    $client_data['password'] = $_POST['customer_pass'];
    $client_data['ptn'] = $_POST['customer_ptn'];
    $client_data['passport_num'] = $_POST['customer_passport'];
    $client_data['passport_expire'] = str_replace('-', '/', $_POST['customer_passport_expire']);
    $client_data['back_date'] = str_replace('-', '/', $_POST['customer_return']);
    $client_data['reg_date_from'] = convert_date_to_timestamp($_POST['customer_reg_date_from']);
    $client_data['reg_date_to'] = convert_date_to_timestamp($_POST['customer_reg_date_to']);
    $client_data['additional_info'] = $_POST['customer_additional_info'];
    $client_data['nationality'] = $_POST['customer_nationality'];

    $num = count($client_data);
    $i = 1;

    $fields = "";
    $values = "";

    //$query = "INSERT INTO pol_clients (" . $fields . ") VALUES (" . $values . ");";

    $query = "UPDATE pol_clients SET ";

    foreach ($client_data as $key => $value) {
        $i++;
        if ($i <= $num) {
            $divider = ", ";
        } else {
            $divider = "";
        }

        $query .= $key . " = ". "'" . $value . "'" . $divider;
    }

    $query .= " WHERE id = " . $client_id;

    //die ($query);

    if ($result = $db->query($query)){
        $_SESSION['notification']['status'] = 'success';
        $_SESSION['notification']['title'] = 'Поздравляю: ';
        $_SESSION['notification']['message'] = 'Данные о клиенте успешно изменены';
    } else {
        $_SESSION['notification']['status'] = 'danger';
        $_SESSION['notification']['status'] = 'Ошибка: ';
        $_SESSION['notification']['message'] = 'Не удалось записать изменения данных';
    }

    $db->close();

    header('Location: http://' . get_base_url());
}