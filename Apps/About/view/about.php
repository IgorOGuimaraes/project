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
    <title>Gabarit.IO | Sobre</title>
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <link href="/project/assets/css/Core/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>


</head>
<body>

<nav>
    <div class="nav-wrapper red darken-4">
        <div class="container">
            <a href="#" class="brand-logo">Gabarit.IO</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?php echo APPLICATION_NAME;?>">Manual</a></li>
                <li><a href="collapsible.html">Sobre</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="container">
        <div class="row">
            <div class="col s12 m9 l9 offset-m1 offset-l1" style="margin-top:13% !important;">
                <div class="card horizontal">
                    <div class="card-image">
                        <img src="/project/assets/img/img_5.jpg" class="responsive-img">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <form id="login-form">
                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="user-name" name="user-name" type="text" class="validate">
                                    <label for="user-name">User</label>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input id="pass-user" name="pass-user" type="password" class="validate">
                                    <label for="pass-user">Password</label>
                                </div>
                            </form>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn right grey darken-4">Login</a>
                        </div>
                    </div>
                </div>
                <div class="right
                    <a href="#" >Esqueceu a senha?</a>
            </div>
        </div>
    </div>
    </div>
</main>

<footer class="page-footer red darken-4" style="bottom: 0; position: absolute; width: 100%;">
    <div class="footer-copyright">
        <div class="container center">
            Copyright © 2018 - FATEC | Faculdade de Tecnologia
        </div>
    </div>
</footer>

<!--  Scripts-->
<script src="/project/assets/js/Core/materialize.min.js"></script>
<script src="/project/assets/js/Core/jquery-3.3.1.min.js"></script>
<script src="/project/assets/js/Core/jquery-ui.js"></script>

</body>
</html>
