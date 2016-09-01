<?php
require_once "inc/not_login.php";
require_once "inc/initial.php";

if ($_GET['ppva']) {
    $ppva = $_GET['ppva'];

    $where = "";

    if ('admin' != $_SESSION['user']['status']) {
        $where = " AND agent_id = " . $_SESSION['user']['id'];
    }

    $query = "SELECT c.*, a.name AS agent FROM pol_clients AS c "
            ."JOIN pol_agents AS a ON c.agent_id = a.id "
            ."WHERE c.ppva = $ppva "
            ."AND c.state_id = 1" . $where
            ." ORDER BY reg_date_from";

    //$result = $db->query($query);

    $result = array();

    // check if any record in db
//    if (!$result->num_rows) {
//        $_SESSION['notification']['status'] = 'danger';
//        $_SESSION['notification']['title'] = 'Ошибка: ';
//        $_SESSION['notification']['message'] = 'Невозможно получить информацию о клиенте для записи';
//        header('Location: http://' . get_base_url());
//    }

} else {
    $_SESSION['notification']['status'] = 'danger';
    $_SESSION['notification']['title'] = 'Ошибка: ';
    $_SESSION['notification']['message'] = 'Не указан ППВА для записи';

    header('Location: http://' . get_base_url());
}

$meta_title = "Начать запись в консульство";
$page_title = "Начать запись в пункт приема визовых анкет " . get_ppva_by_id($ppva);
require_once "header.php";
?>

<section class="section-sm bg-wight">
    <div class="container">
        <div class="row section-header">
            <div class="col-sm-12 text-center">
                <h2 class="sub-header">
                    список Ваших клиентов для записи в пункт приема визовых анкет <?= get_ppva_by_id($ppva) ?><br>
                    Вы можете начать запись одного клиента или сразу всех<br>
                    или изменить ППВА, выбрав из списка.
                </h2>
            </div>
        </div>

        <div class="row section-content">
            <div class="row section-content">
                <div class="col-sm-2 bg-light" style="margin-top: 40px">
                    <h4 class="text-center" style="font-weight: 300">Начните запись всех клиентов</h4>
                    <a class="btn btn-info btn-block" href="start.php?ppva=<?= $ppva ?>" role="button" title="Начать запись клиента <?= $row['name'] . " " . $row['surname'] ?>">
                        <i class="fa fa-play"></i> Старт
                    </a>
                    <h4 class="text-center" style="font-weight: 300; margin-top: 25px">Выберите другой ППВА</h4>
                    <form action="register.php" method="get">
                        <select class="form-control" name="ppva">
                            <?php
                            $ppva_options = get_ppva_array();
                            foreach ($ppva_options as $value => $text) {

                                if ($ppva == $value) {
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
                        <div class="form-group" style="padding-top: 15px">
                            <button type="submit" class="btn btn-block btn-success"><i class="fa fa-step-forward"></i> Выбрать</button>
                        </div>
                    </form>
                </div>

                <div class="col-sm-10">
                    <?php
                    if ($result->num_rows) {
                        ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Имя Фамилия</th>
                                <th>PTN</th>
                                <th>Даты подачи</th>
                                <?php
                                if ('admin' == $_SESSION['user']['status']) {
                                    ?>
                                    <th>Агент</th>
                                    <?php
                                }
                                ?>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while($row = $result->fetch_assoc()) {
                                ?>
                                <tr<?= get_client_state_class($row['state_id']) ?>>
                                    <td>
                                        <div class="checkbox" style="margin: 0">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </td>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?> <?= $row['surname'] ?></td>
                                    <td><?= $row['ptn'] ?></td>
                                    <td><?= convert_timastamp_to_date($row['reg_date_from']) ?> - <?= convert_timastamp_to_date($row['reg_date_to']) ?></td>
                                    <?php
                                    if ('admin' == $_SESSION['user']['status']) {
                                        ?>
                                        <td><?= $row['agent'] ?></td>
                                        <?php
                                    }
                                    ?>
                                    <td style="width: 40px">
                                        <a class="btn btn-info btn-sm" href="start.php?id=<?= $row['id'] ?>" role="button" title="Начать запись клиента <?= $row['name'] . " " . $row['surname'] ?>">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            $db->close();
                            ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        ?>

                        <?php
                    }

                    //$db->close();
                    ?>
                </div><!-- col-sm-10 -->
            </div>
        </div>
    </div>
</section>

<?php
require_once "footer.php";
?>