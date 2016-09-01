<?php
require_once "inc/not_login.php";
require_once "inc/initial.php";
require_once "header.php";

//var_dump($db);

$where = "";

if ('admin' != $_SESSION['user']['status']) {
    $where = " WHERE agent_id = " . $_SESSION['user']['id'];
}

$query = "SELECT c.*, s.state, a.name AS agent FROM pol_clients AS c "
        ."JOIN pol_state AS s ON c.state_id = s.id "
        ."JOIN pol_agents AS a ON c.agent_id = a.id "
        . $where
        . " ORDER BY state_id, id";

$result = $db->query($query);
?>

<section class="section-lg bg-white">
    <div class="container">

        <?php
        display_notification();
        ?>

        <div class="row section-header">
            <div class="col-sm-12 text-center">
                <h1>Список клиентов</h1>
                <h2 class="sub-header">список клиентов для подачи документов в консульство Польши</h2>
            </div>
        </div>

        <div class="row section-content">
            <div class="row section-content">
                <div class="col-sm-12">
                    <?php
                    if ($result->num_rows) {
                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                    <th>PTN</th>
                                    <th>Состояние заявки</th>
                                    <?php
                                    if ('admin' == $_SESSION['user']['status']) {
                                        ?>
                                        <th>Агент</th>
                                        <?php
                                    }
                                    ?>
                                    <th>Управление</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr<?= get_client_state_class($row['state_id']) ?>>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['surname'] ?></td>
                                        <td><?= $row['ptn'] ?></td>
                                        <td><?= $row['state'] ?></td>
                                        <?php
                                        if ('admin' == $_SESSION['user']['status']) {
                                            ?>
                                            <td><?= $row['agent'] ?></td>
                                            <?php
                                        }
                                        ?>
                                        <td style="width: 190px">
                                            <a class="btn btn-info btn-sm" data-toggle="confirmation" href="info.php?id=<?= $row['id'] ?>" role="button" title="Подробная информация о клиенте">
                                                <i class="fa fa-user-secret"></i> Подробнее
                                            </a>
                                            <a class="btn btn-warning btn-sm" href="edit.php?id=<?= $row['id'] ?>" role="button" title="Редактировать информацию о клиенте">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="remove.php?id=<?= $row['id'] ?>" role="button" title="Удалить запись клиента">
                                                <i class="fa fa-remove"></i>
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
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once "footer.php";
?>
