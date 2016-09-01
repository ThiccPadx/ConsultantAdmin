<?php
require_once "inc/initial.php";

if ($_POST['agent_login'] && $_POST['agent_password']) {
    $agent_login = $_POST['agent_login'];
    $agent_password = $_POST['agent_password'];

    $query = "SELECT * FROM pol_agents AS a "
        ."WHERE login = '$agent_login' AND password = '$agent_password'";

    $result = $db->query($query);

    if ($result->num_rows) {
        $row = $result->fetch_assoc();

        $_SESSION['user']['name'] = $row['name'];
        $_SESSION['user']['status'] = $row['status'];
        $_SESSION['user']['id'] = $row['id'];

        header('Location: http://' . get_base_url());
    } else {

        $_SESSION['notification']['status'] = 'danger';
        $_SESSION['notification']['title'] = 'Ошибка: ';
        $_SESSION['notification']['message'] = 'Данные Вашей учетной записи отсутствуют в Базе данных. Попробуйте ввести пароль еще раз.';
    }
}

require_once "header-login.php";
?>

<section class="section-xl bg-white">
    <div class="container">

        <?php
        display_notification();
        ?>

        <div class="row section-header" style="padding-bottom: 45px">
            <div class="col-sm-12 text-center">
                <h1>Здравствуйте</h1>
                <h2 class="sub-header">введите данные Вашей учетной записи</h2>
            </div>
        </div>

        <div class="row section-content">
            <form action="login.php" method="post" class="form-horizontal">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="agent_login" class="col-sm-3 control-label">Логин</label>
                            <div class="input-group col-sm-9">
                                <input type="text" class="form-control" id="agent_login" name="agent_login" placeholder="Пароль">
                                <span class="input-group-addon" id="basic-addon2">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="agent_password" class="col-sm-3 control-label">Пароль</label>
                            <div class="input-group col-sm-9">
                                <input type="password" class="form-control" id="agent_password" name="agent_password" placeholder="Пароль">
                                <span class="input-group-addon" id="basic-addon2">
                                    <i class="fa fa-unlock-alt"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding: 0 0 0 25px">
                            <button type="submit" class="btn btn-block btn-success"><i class="fa fa-sign-in"></i> Войти</button>
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
