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
        $_SESSION['notification']['message'] = 'У Вас нет прав вносить изменения в информацию о данном клиенте';
        header('Location: http://' . get_base_url());
    }

} else {
    $_SESSION['notification']['status'] = 'danger';
    $_SESSION['notification']['title'] = 'Ошибка: ';
    $_SESSION['notification']['message'] = 'Вы не выбрали клиента для просмотра информации';
    header('Location: http://' . get_base_url());
}

$meta_title = "Редактировать нформацию о клиенте";
$page_title = "Редактирование информации о клиенте с ID " . $id;
require_once "header.php";
?>

<section class="section-md bg-light">
    <div class="container">

        <div class="row section-header">
            <div class="col-sm-12 text-center">
                <h2 class="sub-header">заполниет необходимые поля формы и нажмите кнопку "Сохранить изменения"</h2>
            </div>
        </div>

        <div class="row section-content">
            <form action="save_changes.php" method="post">
                <input type="hidden" value="<?= $row['id'] ?>" name="customer_id">
                <div class="col-sm-12">
                    <div class="row">
                        <!-- Customer name - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_name">Имя</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Имя" value="<?= $row['name'] ?>">
                            </div>
                        </div>
                        <!-- Customer name - end -->

                        <!-- Customer surname - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_surname">Фамилия</label>
                                <input type="text" class="form-control" id="customer_surname" name="customer_surname" placeholder="Фамилия" value="<?= $row['surname'] ?>">
                            </div>
                        </div>
                        <!-- Customer surname - end -->

                        <div class="col-sm-6">
                            <div class="row">
                                <!-- Customer status - start -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="customer_status">Статус</label>
                                        <select name="customer_status" id="customer_status" class="form-control">
                                            <option value="">...</option>
                                            <?php
                                            $status_options = get_client_status_array();
                                            foreach ($status_options as $value => $text) {
                                                if ($value == $row['status']) {
                                                    $selected = " selected=\"selected\"";
                                                } else {
                                                    $selected = "";
                                                }
                                                ?>
                                                <option value="<?= $value ?>"<?= $selected ?>><?= $text ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Customer status - end -->

                                <div class="col-sm-9">
                                    <div class="row">
                                        <!-- Customer date of birth - start -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="customer_birth">Дата рождения</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-sngl-datepicker" id="customer_birth" name="customer_birth" placeholder="Дата рождения" value="<?= $row['birth_date'] ?>">
                                                    <span class="input-group-addon" id="basic-addon2">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Customer date of birth - end -->

                                        <!-- Customer nationality - start -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="customer_nationality">Национальность</label>
                                                <select name="customer_nationality" id="customer_nationality" class="form-control">
                                                    <option value="-1">- - -</option>
                                                    <?php
                                                    $nationality_options = get_nationality_array();
                                                    foreach ($nationality_options as $value => $text) {

                                                        if ($row['nationality'] == $value) {
                                                            $selected = " selected=\"selected\"";
                                                        } else {
                                                            $selected = "";
                                                        }
                                                        ?>
                                                        <option value="<?= $value ?>"<?= $selected ?>><?= $text ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Customer nationality - end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Customer passport number - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_passport">Номер паспорта</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="customer_passport" name="customer_passport" placeholder="Номер паспорта" value="<?= $row['passport_num'] ?>">
                                    <span class="input-group-addon" id="basic-addon2">
                                        <i class="fa fa-book"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Customer passport number - end -->

                        <!-- Customer passport date expire - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_passport_expire">Дата окончания паспорта</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-sngl-datepicker" id="customer_passport_expire" name="customer_passport_expire" value="<?= $row['passport_expire'] ?>">
                                    <span class="input-group-addon" id="basic-addon2">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Customer passport date expire - end -->

                        <!-- Customer email - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_email">Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="customer_email" name="customer_email" value="<?= $row['email'] ?>">
                                    <span class="input-group-addon" id="basic-addon2">
                                        <i class="fa fa-envelope-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Customer email - end -->

                        <!-- Customer password - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_pass">Пароль</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="customer_pass" name="customer_pass" value="<?= $row['password'] ?>">
                                    <span class="input-group-addon" id="basic-addon2">
                                        <i class="fa fa-unlock-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Customer password - end -->
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_ppva">ППВА</label>
                                <select name="customer_ppva" id="customer_ppva" class="form-control">
                                    <option value="-1">-Оберіть ППВА-</option>
                                    <?php
                                    $ppva_options = get_ppva_array();
                                    foreach ($ppva_options as $value => $text) {

                                        if ($row['ppva'] == $value) {
                                            $selected = " selected=\"selected\"";
                                        } else {
                                            $selected = "";
                                        }
                                        ?>
                                        <option value="<?= $value ?>"<?= $selected ?>><?= $text ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Purpose - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_purpose">Цель визита</label>
                                <select name="customer_purpose" id="customer_purpose" class="form-control">
                                    <option value="-1">-Будь ласка, оберіть-</option>
                                    <?php
                                    $purposes_options = get_purpose_array();
                                    foreach ($purposes_options as $value => $text) {

                                        if ($row['purpose'] == $value) {
                                            $selected = " selected=\"selected\"";
                                        } else {
                                            $selected = "";
                                        }
                                        ?>
                                        <option value="<?= $value ?>"><?= $text ?></option>
                                        <?php
                                    }
                                    ?>
                                    <option value="1" selected="selected">Подача документів</option>
                                    <option value="2">Консультація</option>
                                </select>
                            </div>
                        </div>
                        <!-- Purpose - end -->

                        <!-- PTN - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_ptn">PTN</label>
                                <input type="text" class="form-control form-mask-ptn" id="customer_ptn" name="customer_ptn" value="<?= $row['ptn'] ?>">
                            </div>
                        </div>
                        <!-- PTN - end -->

                        <!-- Date return - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_return">Дата возвращения</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-sngl-datepicker" id="customer_return" name="customer_return" value="<?= $row['back_date'] ?>">
                                    <span class="input-group-addon" id="basic-addon2">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Date return - end -->
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="text-center">Желаемая дата подачи документов</h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="customer_reg_date_from">Дата с</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-sngl-datepicker" id="customer_reg_date_from" name="customer_reg_date_from" value="<?= convert_timastamp_to_date($row['reg_date_from']) ?>">
                                            <span class="input-group-addon" id="basic-addon2">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="customer_reg_date_to">Дата до</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-sngl-datepicker" id="customer_reg_date_to" name="customer_reg_date_to" value="<?= convert_timastamp_to_date($row['reg_date_to']) ?>">
                                            <span class="input-group-addon" id="basic-addon2">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="customer_additional_info">Дополнительная информация</label>
                                <textarea id="customer_additional_info" class="form-control" rows="3" name="customer_additional_info"><?= $row['additional_info'] ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4">
                            <div class="form-group" style="padding-top: 25px">
                                <button type="submit" class="btn btn-block btn-lg btn-success"><i class="glyphicon glyphicon-floppy-saved"></i> Сохранить изменения</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
require_once "footer.php";
?>