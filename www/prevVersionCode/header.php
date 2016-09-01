<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Metadata -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="description" content="A Template by Synthetica"/>
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP"/>
    <meta name="author" content="Synthetica"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Title of the page -->
    <title>
        <?php
        if ($meta_title) {
            echo $meta_title;
        } else {
            echo "Запись в Польское консульство";
        }
        ?>
    </title>

    <!-- Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">


</head>

<body>
<div id="content_wrapper">
    <!-- Main navigation menu - Start -->
    <nav role="navigation" class="navbar navbar-default" id="block-main-nav">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav" id="menu-header-menu">
                        <li class="menu-item current-menu-item active">
                            <a href="index.php" title="Перейти на главную страницу">
                                <i class="fa fa-home" style="margin-right: 5px"></i>Главная
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="add_new.php" title="Добавить нового клиента">
                                <i class="fa fa-user-plus" style="margin-right: 5px"></i>Новый клиент
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="register.php?ppva=12" title="Начать запись для подачи документов">
                                <i class="fa fa-play" style="margin-right: 5px"></i>Начать запись
                            </a>
                        </li>

                        <li id="login_info" class="menu-item">
                            <a href="#" disabled="disabled"><i class="fa fa-user"></i> <?= $_SESSION['user']['name'] ?> (<?= $_SESSION['user']['id'] ?>)</a>
                            <a class="btn btn-default" href="logout.php" role="button" title="Выйти"><i class="fa fa-sign-out"></i></a>
                        </li>
                    </ul>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </nav>
    <!-- Main navigation menu - End -->

    <header id="header" class="section-md bg-light parallax bg-holder txt-light">
        <div class="bg-parallax" style="background-image:url('/assets/img/poland.jpg')"></div>
        <div class="overlay bg-black bg-op-20"></div>
        <div class="container">
            <div class="row section-header">
                <div class="col-sm-12 text-center">
                    <?php if ($page_title) {
                        ?>
                        <h1><?= $page_title ?></h1>
                        <?php
                    } else {
                        ?>
                        <h1>ПОДАТИ ЗАЯВУ НА ВІЗУ ДО ПОЛЬЩІ</h1>
                        <?php
                    }?>

                </div>
            </div>
        </div>
    </header>
