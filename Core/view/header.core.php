<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Gabarit.io | <?php echo $page_name; ?></title>
    <link href="<?php echo APPLICATION_NAME; ?>/assets/css/Core/custom.css" type="text/css" rel="stylesheet"
          media="screen,projection">
    <link href="<?php echo APPLICATION_NAME; ?>/assets/css/Core/ghpages-materialize.css" type="text/css"
          rel="stylesheet" media="screen,projection">
    <link href="<?php echo APPLICATION_NAME; ?>/assets/css/Core/jquery.gridster.min.css" type="text/css"
          rel="stylesheet" media="screen,projection">
    <link href="<?php echo APPLICATION_NAME; ?>/assets/css/Core/introjs.min.css" type="text/css" rel="stylesheet"
          media="screen,projection">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo APPLICATION_NAME; ?>/favicon.png">
    <?php
    if (!empty($style)) {

        foreach ($style as $css) {

            echo "<link href='$css' type='text/css' rel='stylesheet'>";

        }

    }
    ?>

</head>
<body >
<div style="position: fixed; left:47%; top:45%; z-index: 9999999;" class="preloader-wrapper big active loading-pre">
    <div class="spinner-layer spinner-magenta-only">
        <div class="circle-clipper left">
            <div class="circle"></div>
        </div>
        <div class="gap-patch">
            <div class="circle"></div>
        </div>
        <div class="circle-clipper right">
            <div class="circle"></div>
        </div>
    </div>
</div>
<script>var APPLICATION_NAME = '<?php echo APPLICATION_NAME;?>';</script>
<header id="load-header" style="display: none;">
    <nav>
        <div class="nav-wrapper t-grey5">
            <div class="col s12 header">
                <ul id="nav-mobile" class="right">
                    <li><i class="material-icons tx-white font-size-2">account_circle</i></li>
                    <li class="tx-white"><?php echo $_SESSION['FullName']; ?></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <a style="position:absolute; left:0; top:-28px;" href="#" data-target="nav-mobile"
           class="button-collapse top-nav sidenav-trigger full hide-on-large-only">
            <i id="side-nav" class="material-icons tx-white">menu</i></a>
    </div>
    <ul id="nav-mobile" class="sidenav sidenav-fixed t-red2 collapsible">
        <li class="logo">
            <a id="logo-container">
                <img class="responsive-image"
                     src="<?php echo APPLICATION_NAME; ?>/assets/img/logo.png">
            </a>
        </li>
        <hr>

        <li class="bold">
            <a target="" href="<?php echo APPLICATION_NAME; ?>/Dashboard/home" class="waves-effect waves-teal white-text">Gráficos<i class="material-icons white-text">dashboard</i></a>
        </li>
        <li class="bold">
            <a target="" href="<?php echo APPLICATION_NAME; ?>/ManagementStudent/home" class="waves-effect waves-teal white-text">Gerenciamento de Aluno<i class="material-icons white-text">people</i></a>
        </li>
        <li class="bold">
            <a target="" href="<?php echo APPLICATION_NAME; ?>/ManagementSubject/home" class="waves-effect waves-teal white-text">Gerenciamento de Disciplinas<i class="material-icons white-text">content_paste</i></a>
        </li>

        <hr>
        <li class="bold">
            <a target="" href="<?php echo APPLICATION_NAME; ?>/dashboard/guide" class="waves-effect waves-teal white-text">Manual<i class="material-icons white-text">import_contacts</i></a>
        </li>
        <li class="bold">
            <a target="" href="<?php echo APPLICATION_NAME; ?>/dashboard/settings" class="waves-effect waves-teal white-text">Configuração<i class="material-icons white-text">settings</i></a>
        </li>
        <li class="bold">
            <a target="" href="<?php echo APPLICATION_NAME; ?>/login/logout/" class="waves-effect waves-teal white-text">Logout<i class="material-icons white-text">exit_to_app</i></a>
        </li>
    </ul>
    <div class="patreon-ad t-red2"><a href="http://fatecsbc.edu.br/" target="_blank" class="waves-effect tx-white">Copyright © <?php echo date('Y'); ?> FATEC SBC</a></div>
</header>
<main id="load-main" style="display: none;">
