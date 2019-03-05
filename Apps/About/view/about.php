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
    <title>Gabarit.IO | About</title>
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
                <li><a href="/<?=APPLICATION_NAME?>/About/home">Guide</a></li>
                <li><a href="/<?=APPLICATION_NAME?>/Login/home">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h5 class="header">About</h5>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam porta accumsan odio at vestibulum. Donec placerat id lacus non porttitor. Quisque iaculis eros quis egestas dignissim. Quisque fermentum urna tellus, id eleifend velit eleifend vel. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin lobortis condimentum nulla, et vestibulum justo porta ut. Fusce pulvinar ligula id posuere sollicitudin. Maecenas quis quam et eros porttitor lobortis. Vivamus ut nisi nec purus mattis scelerisque vitae vitae mauris. In malesuada tincidunt nisl sed elementum. Etiam eu scelerisque nibh. Cras sollicitudin porta mi, ac tempor neque condimentum ut. Aliquam mollis odio vitae sem maximus, vitae convallis quam venenatis. Sed id nulla est. Ut sollicitudin cursus euismod. Cras faucibus magna sagittis pulvinar tincidunt.</p>
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

</body>
</html>
