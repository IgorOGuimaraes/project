<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Teste | <?php echo $page_name; ?></title>
    <link href="/<?php echo APPLICATION_NAME; ?>/assets/css/Core/custom.css" type="text/css" rel="stylesheet"
          media="screen,projection">
    <link href="/<?php echo APPLICATION_NAME; ?>/assets/css/Core/ghpages-materialize.css" type="text/css"
          rel="stylesheet" media="screen,projection">
    <link href="/<?php echo APPLICATION_NAME; ?>/assets/css/Core/jquery.gridster.min.css" type="text/css"
          rel="stylesheet" media="screen,projection">
    <link href="/<?php echo APPLICATION_NAME; ?>/assets/css/Core/introjs.min.css" type="text/css" rel="stylesheet"
          media="screen,projection">
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
        <div class="nav-wrapper t-magenta">
            <div class="col s12 header">
                <a style="margin-left: 25px;" href="#!" class="breadcrumb">Home</a>
                <a href="#!" class="breadcrumb">Apps</a>
                <a href="#!" class="breadcrumb white-text"><?php echo $page_name; ?></a>
                <ul id="nav-mobile" class="right">
                    <li><i class="material-icons white-text font-size-2">account_circle</i></li>
                    <li class="tx-white"><?php echo $_SESSION['automation_UserFullName']; ?></li>
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
    <ul id="nav-mobile" class="sidenav sidenav-fixed t-grey5 collapsible">
        <li class="logo">
            <a id="logo-container" href="/<?php echo APPLICATION_NAME; ?>" class="brand-logo">
                <img class="responsive-image" style="z-index: 9999999999 !important;"
                     src="/<?php echo APPLICATION_NAME; ?>/assets/img/Core/logo-dat-med.png" data-step="1"
                     data-intro="Welcome to The New DAT Automation Tool. Let's Begin!">
            </a>
        </li>
        <li class="search">
            <div class="search-wrapper">
                <input id="search" placeholder="Search"><i class="material-icons">search</i>
                <div class="search-results"></div>
            </div>
        </li>
        <?php


        if (empty($users_apps[2]))
            echo '<li class="bold"><a class="white-text header">No Apps Installed 😓</a></li>';
        else {

            foreach ($users_apps as $name => $app) {

                if ($app['AppName'] != 'Login' && $app['AppName'] != 'Dashboard') {

                    ?>

                    <li class="bold">
                        <a href="<?php echo '/' . APPLICATION_NAME . '/' . strtolower($app['AppName']) . '/home'; ?>"
                           class="waves-effect waves-teal white-text"><?php echo $app['AppName']; ?><i
                                    class="material-icons white-text">apps</i></a>
                    </li>

                    <?php
                }
            }
        }

        ?>
        <hr>
        <li class="bold">
            <a target="" href="/<?php echo APPLICATION_NAME; ?>/dashboard/home" class="waves-effect waves-teal white-text">Home<i class="material-icons white-text">home</i></a>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-teal white-text"><i class="material-icons left white-text">flag</i>Language </a>
            <div class="collapsible-body">
                <ul>
                    <li><a class="change-language" data-id="pt" href="#">Português</a></li>
                    <li><a class="change-language" data-id="en" href="#">English</a></li>
                </ul>
            </div>
        </li>
        <li class="bold">
            <a target="" href="/<?php echo APPLICATION_NAME; ?>/dashboard/settings" class="waves-effect waves-teal white-text">Settings<i class="material-icons white-text">settings</i></a>
        </li>
        <li class="bold">
            <a target="" href="/<?php echo APPLICATION_NAME; ?>/dashboard/store" class="waves-effect waves-teal white-text">Store<i class="material-icons white-text">local_grocery_store</i></a>
        </li>
        <li class="bold">
            <a target="" href="/<?php echo APPLICATION_NAME; ?>/login/logout/" class="waves-effect waves-teal white-text">Logout<i class="material-icons white-text">exit_to_app</i></a>
        </li>
    </ul>
    <div class="patreon-ad t-grey5"><a href="https://www.t-systems.com.br" target="_blank" class="waves-effect tx-white">© <?php echo date('Y'); ?> T-SYSTEMS</a></div>
</header>
<main id="load-main" style="display: none;">
