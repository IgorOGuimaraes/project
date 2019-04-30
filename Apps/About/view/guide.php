<?php
/**
 * @author Igor de Oliveira Guimarães
 * @version 1.0.0
 * @description This controller is use on login interaction for the core
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Gabarit.IO | Guide</title>
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <link href="<?=APPLICATION_NAME?>/assets/css/Core/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?=APPLICATION_NAME?>/assets/css/Core/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>


</head>
<body>

<nav>
    <div class="nav-wrapper t-grey4 darken-4">
        <div class="container">
            <a class="brand-logo hide-on-med-and-down"><img src="<?=APPLICATION_NAME?>/assets/img/thumbnail_gabiri.io_logo.png" class="responsive-img" style="height: 35px;"></a>
            <a data-target="slide-out" class="sidenav-trigger tx-grey5"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?=APPLICATION_NAME?>/About/about" class="tx-grey5">Sobre</a></li>
                <li><a href="<?=APPLICATION_NAME?>/Login/home" class="tx-grey5">Login</a></li>
            </ul>
            <ul id="slide-out" class="sidenav">
                <li><a class="brand-logo"><img src="<?=APPLICATION_NAME?>/assets/img/thumbnail_gabiri.io_logo.png" class="responsive-img"></a></li>
                <li>\n</li>
                <li><a href="<?=APPLICATION_NAME?>/About/about" class="tx-grey5">Sobre</a></li>
                <li><a href="<?=APPLICATION_NAME?>/Login/home" class="tx-grey5">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<main style="margin-bottom: 65px;">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h5 class="header">Manual</h5>

                <p>A seguir, apresentamos o manual de utilização da plataforma de correções de provas automzatiza (aplicativo mobile e portal) Gabart.io</p>

                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">desktop_windows</i>Portal WEB</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">phone_android</i>Aplicativo Android</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                </ul>
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
<script>
    var sidenav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sidenav);

    var colls = document.querySelectorAll('.collapsible');
    M.Collapsible.init(colls);
</script>

</body>
</html>
