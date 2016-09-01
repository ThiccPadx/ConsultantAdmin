<?php
require_once "inc/not_login.php";
require_once "inc/initial.php";

$meta_title = "Добавление нового клиента";
$page_title = "Добавление нового клиента на запись в консульство Польши";
require_once "header.php";
?>

<section class="section-md bg-light">
    <div class="container">
        <div class="row section-header">
            <div class="col-sm-12 text-center">
                <h2 class="sub-header">Все поля формы отмеченные "<span class="txt-red">*</span>" обязательны для заполнения</h2>
            </div>
        </div>

        <div class="row section-content">
            <form action="save_new.php" method="post" class="form-validated">
                <div class="col-sm-12">
                    <div class="row">
                        <!-- Customer name - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_name">Имя <span class="txt-red">*</span></label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Имя" required>
                            </div>
                        </div>
                        <!-- Customer name - end -->

                        <!-- Customer surname - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_surname">Фамилия <span class="txt-red">*</span></label>
                                <input type="text" class="form-control" id="customer_surname" name="customer_surname" placeholder="Фамилия" required>
                            </div>
                        </div>
                        <!-- Customer surname - end -->

                        <div class="col-sm-6">
                            <div class="row">
                                <!-- Customer status - start -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="customer_status">Статус <span class="txt-red">*</span></label>
                                        <select name="customer_status" id="customer_status" class="form-control" required>
                                            <option value="">...</option>
                                            <option value="Dr.">Dr.</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Ms.">Ms.</option>
                                            <option value="Mstr.">Mstr.</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Customer status - end -->

                                <div class="col-sm-9">
                                    <div class="row">
                                        <!-- Customer date of birth - start -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="customer_birth">Дата рождения <span class="txt-red">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-sngl-datepicker" id="customer_birth" name="customer_birth" placeholder="Дата рождения" required>
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
                                                <label for="customer_nationality">Национальность <span class="txt-red">*</span></label>
                                                <select name="customer_nationality" id="customer_nationality" class="form-control" required>
                                                    <option value="-1">- - -</option>
                                                    <?php
                                                    $nationality_options = get_nationality_array();
                                                    foreach ($nationality_options as $value => $text) {

                                                        if (219 == $value) {
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
                                    <input type="text" class="form-control" id="customer_passport" name="customer_passport" placeholder="Номер паспорта">
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
                                <label for="customer_passport_expire">Дата окончания паспорта <span class="txt-red">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-sngl-datepicker" id="customer_passport_expire" name="customer_passport_expire" required>
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
                                <label for="customer_email">Email <span class="txt-red">*</span></label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Email" required>
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
                                <label for="customer_pass">Пароль <span class="txt-red">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="customer_pass" name="customer_pass" placeholder="Пароль" required>
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
                                <label for="customer_ppva">ППВА <span class="txt-red">*</span></label>
                                <select name="customer_ppva" id="customer_ppva" class="form-control" required>
                                    <option value="-1">-Оберіть ППВА-</option>
                                    <?php
                                    $ppva_options = get_ppva_array();
                                    foreach ($ppva_options as $value => $text) {

                                        if (12 == $value) {
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
                                <label for="customer_purpose">Цель визита <span class="txt-red">*</span></label>
                                <select name="customer_purpose" id="customer_purpose" class="form-control" required>
                                    <option value="-1">-Будь ласка, оберіть-</option>
                                    <option value="1" selected="selected">Подача документів</option>
                                    <option value="2">Консультація</option>
                                </select>
                            </div>
                        </div>
                        <!-- Purpose - end -->

                        <!-- PTN - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_ptn">PTN <span class="txt-red">*</span></label>
                                <input type="text" class="form-control form-mask-ptn" id="customer_ptn" name="customer_ptn" placeholder="PTN" required>
                            </div>
                        </div>
                        <!-- PTN - end -->

                        <!-- Date return - start -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="customer_return">Дата возвращения <span class="txt-red">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-sngl-datepicker" id="customer_return" name="customer_return" required>
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
                                        <label for="customer_reg_date_from">Дата с <span class="txt-red">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-sngl-datepicker" id="customer_reg_date_from" name="customer_reg_date_from" required>
                                            <span class="input-group-addon" id="basic-addon2">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="customer_reg_date_to">Дата до <span class="txt-red">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-sngl-datepicker" id="customer_reg_date_to" name="customer_reg_date_to" required>
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
                                <textarea id="customer_additional_info" class="form-control" rows="3" name="customer_additional_info"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4">
                            <div class="form-group" style="padding-top: 25px">
                                <button type="submit" class="btn btn-block btn-lg btn-success"><i class="glyphicon glyphicon-floppy-saved"></i> Сохранить данные</button>
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
