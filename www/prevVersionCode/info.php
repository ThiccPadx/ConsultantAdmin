<?php
require_once "inc/not_login.php";
require_once "inc/initial.php";

if ($_GET['id']) {
    $id = $_GET['id'];

    $query = "SELECT c.*, s.state FROM pol_clients AS c "
           . "JOIN pol_state AS s ON c.state_id = s.id "
           . "WHERE c.id = $id";

    $result = $db->query($query);

    // check if any record in db
    if (!$result->num_rows) {
        $_SESSION['notification']['status'] = 'danger';
        $_SESSION['notification']['title'] = 'Ошибка: ';
        $_SESSION['notification']['message'] = 'Невозможно получить информацию о клиенте с ID ' . $id;
        header('Location: http://' . get_base_url());
    }

    $row = $result->fetch_assoc();

    $db->close();

    if(($_SESSION['user']['id'] != $row['agent_id']) && ('admin' != $_SESSION['user']['status'])) {
        $_SESSION['notification']['status'] = 'danger';
        $_SESSION['notification']['title'] = 'Ошибка: ';
        $_SESSION['notification']['message'] = 'У Вас нет прав просматривать информацию о данном клиенте';
        header('Location: http://' . get_base_url());
    }

} else {
    $_SESSION['notification']['status'] = 'danger';
    $_SESSION['notification']['title'] = 'Ошибка: ';
    $_SESSION['notification']['message'] = 'Вы не выбрали клиента для просмотра информации';

    header('Location: http://' . get_base_url());
}

$meta_title = "Информация о клиенте";
$page_title = "Подробная информация о клиенте с ID " . $id;
require_once "header.php";
?>

<section class="section-lg bg-white">
    <div class="container">
        <div class="row section-content">
            <div class="col-sm-3 text-center">
                <div class="thumbnail">
                    <?= get_avatar($row['status']) ?>
                    <div class="caption text-center">
                        <h3><?= $row['name'] ?> <?= $row['surname'] ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="text-center" style="margin-bottom: 25px">Личные и паспортные данные</h3>
                        <dl class="dl-horizontal">
                            <dt>Статус</dt>
                            <dd><?= $row['status'] ?></dd>
                            <dt>Дата рождения</dt>
                            <dd><?= $row['birth_date'] ?></dd>
                            <dt>Национальность</dt>
                            <dd><?= get_nationality_by_id($row['nationality']) ?></dd>
                            <dt>Номер паспорта</dt>
                            <dd><?= $row['passport_num'] ?></dd>
                            <dt>Действителен до</dt>
                            <dd><?= $row['passport_expire'] ?></dd>
                            <dt>Email</dt>
                            <dd><?= $row['email'] ?></dd>
                            <dt>Пароль</dt>
                            <dd><?= $row['password'] ?></dd>
                        </dl>
                    </div>
                    <div class="col-sm-6">
                        <h3 class="text-center" style="margin-bottom: 25px">Данные для консульства</h3>
                        <dl class="dl-horizontal">
                            <dt>Состояние заявки</dt>
                            <dd><?= $row['state'] ?></dd>
                            <dt>Даты подачи</dt>
                            <dd><?= convert_timastamp_to_date($row['reg_date_from']) ?> - <?= convert_timastamp_to_date($row['reg_date_to']) ?></dd>
                            <dt>ППВА</dt>
                            <dd><?= get_ppva_by_id($row['ppva']) ?></dd>
                            <dt>PTN</dt>
                            <dd><?= $row['ptn'] ?></dd>
                            <dt>Цель визита</dt>
                            <dd><?= $row['purpose'] ?></dd>
                            <dt>Дата возвращения</dt>
                            <dd><?= $row['back_date'] ?></dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl class="dl-horizontal">
                            <dt>Примечания</dt>
                            <dd><?= $row['additional_info'] ?></dd>
                        </dl>
                    </div>
                    <div class="col-sm-12" style="padding-left: 190px">
                        <a class="btn btn-warning btn-sm" href="edit.php?id=<?= $row['id'] ?>" role="button" title="Редактировать информацию о клиенте">
                            <i class="fa fa-pencil"></i> Редактировать информацию
                        </a>
                        <a class="btn btn-danger btn-sm" href="remove.php?id=<?= $row['id'] ?>" role="button" title="Удалить запись клиента">
                            <i class="fa fa-remove"></i> Удалить клиента
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once "footer.php";
?>