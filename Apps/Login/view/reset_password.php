<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Gabarit.IO | Portal</title>
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <!--    <link href="/project/assets/css/Application/Login/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
    <link href="/<?php echo APPLICATION_NAME; ?>/assets/css/Core/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="icon" type="image/png" href="/<?php echo APPLICATION_NAME; ?>/favicon.png">


</head>
<script>
    var APPLICATION_NAME = '<?php echo APPLICATION_NAME;?>';
</script>
<body>

<nav>
    <div class="nav-wrapper red darken-4">
        <div class="container">
            <a href="#" class="brand-logo">Gabarit.IO</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/<?=APPLICATION_NAME?>/About/home">Guide</a></li>
                <li><a href="/<?=APPLICATION_NAME?>/About/about">About</a></li>
                <li>|</li>
                <li><a href="/<?=APPLICATION_NAME?>/Login/home">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="container">
        <div class="row">
            <div class="col s12 m9 l9 offset-m1 offset-l1" style="margin-top:13% !important;">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <div class="card-content">
                            <form id="reset-form">
                                <div class="input-field">
                                    <i class="material-icons prefix">email</i>
                                    <input placeholder="exemplo@fatec.sp.gov.br" id="email-user" name="email-user" type="email" class="validate">
                                    <label for="email-user">Informe o e-mail para receber a nova senha:</label>
                                </div>
                            </form>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn right grey darken-4" id="enviar">Enviar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="page-footer red darken-4" style="bottom: 0; position: absolute; width: 100%;">
    <div class="footer-copyright">
        <div class="container center">
            Copyright © 2018 - FATEC SBC | Faculdade de Tecnologia
        </div>
    </div>
</footer>

<!--  Scripts-->
<script src="/project/assets/js/Core/materialize.min.js"></script>
<script src="/project/assets/js/Core/jquery-3.3.1.min.js"></script>
<script src="/project/assets/js/Core/jquery-ui.js"></script>
<script src="/project/assets/js/Apps/Login/reset.js"></script>

</body>
</html>