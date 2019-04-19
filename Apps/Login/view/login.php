<?php
if (isset($_SESSION['UserID'])) {
    header('Location: ' . APPLICATION_NAME . '/dashboard/home');
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Gabarit.IO | Portal</title>
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <link href="<?php echo APPLICATION_NAME; ?>/assets/css/Core/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?php echo APPLICATION_NAME; ?>/assets/css/Core/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel="icon" type="image/png" href="<?php echo APPLICATION_NAME; ?>/favicon.png">


</head>
<body>

<script>
    var APPLICATION_NAME = '<?php echo APPLICATION_NAME;?>';
    var redir = '<?php

        if(!empty($_GET)){
            echo @$_GET['redir'];
        }


        ?>';
</script>

<nav>
    <div class="nav-wrapper t-grey4">
        <div class="container">
            <a class="brand-logo hide-on-med-and-down"><img src="<?=APPLICATION_NAME?>/assets/img/thumbnail_gabiri.io_logo.png" class="responsive-img" style="height: 35px;"></a>
            <a data-target="slide-out" class="sidenav-trigger tx-grey5"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?=APPLICATION_NAME?>/About/home" class="tx-grey5">Manual</a></li>
                <li><a href="<?=APPLICATION_NAME?>/About/about" class="tx-grey5">Sobre</a></li>
            </ul>
            <ul id="slide-out" class="sidenav">
                <li><a class="brand-logo"><img src="<?=APPLICATION_NAME?>/assets/img/thumbnail_gabiri.io_logo.png" class="responsive-img"></a></li>
                <li>\n</li>
                <li><a href="<?=APPLICATION_NAME?>/About/home" class="tx-grey5">Manual</a></li>
                <li><a href="<?=APPLICATION_NAME?>/About/about" class="tx-grey5">Sobre</a></li>
            </ul>
        </div>
    </div>
</nav>

<main style="margin-bottom: 65px;">
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l6 offset-m3 offset-l3">
                <div class="card">
                    <div class="card-image">
                        <div style="width: 50%; height: auto; margin-left: 25%;">
                            <img src="<?=APPLICATION_NAME?>/assets/img/thumbnail_gabiri.io_icone.png" class="responsive-img"><br>
                            <img src="<?=APPLICATION_NAME?>/assets/img/thumbnail_gabiri.io_logo.png" class="responsive-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <form id="login-form">
                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="user-name" name="user-name" type="text" class="validate">
                                <label for="user-name">Usuário</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="pass-user" name="pass-user" type="password" class="validate">
                                <label for="pass-user">Senha</label>
                            </div>
                        </form>
                    </div>
                    <div class="card-action right">
                        <a class="btn grey darken-4" id="login">Login</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="right">
                    <a href="<?=APPLICATION_NAME?>/Login/reset_password" >Esqueceu a senha?</a>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="page-footer t-io-blue darken-4" style="bottom: 0; position: fixed; width: 100%;">
    <div class="footer-copyright">
        <div class="container center">
            Copyright © <?php echo date('Y'); ?> - Gabarit.IO
        </div>
    </div>
</footer>

<!--  Scripts-->
<script src="<?=APPLICATION_NAME?>/assets/js/Core/materialize.min.js"></script>
<script src="<?=APPLICATION_NAME?>/assets/js/Core/jquery-3.3.1.min.js"></script>
<script src="<?=APPLICATION_NAME?>/assets/js/Core/jquery-ui.js"></script>
<script src="<?=APPLICATION_NAME?>/assets/js/Apps/Login/home.js?v=2"></script>

</body>
</html>