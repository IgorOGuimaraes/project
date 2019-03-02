<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/framework/assets/css/Core/custom.css">
    <link type="text/css" rel="stylesheet" href="/framework/assets/css/Core/prism.css">
    <link type="text/css" rel="stylesheet" href="/framework/assets/css/Core/ghpages-materialize.css">
    <link type="text/css" rel="stylesheet" href="/framework/assets/css/Core/materialize.min.css"
          media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<header>

    <nav class="top-nav">
        <div class="container">
            <div class="nav-wrapper">
                <div class="row">
                    <div class="col s6 offset-s1">
                        <h3 class="header">PAGE NAME</h3>
                    </div>
                    <div class="col s5 ">
                        <a href="#" class="font-size-4"><i class="material-icons tx-magenta right right-align">notifications</i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <a href="#" data-target="nav-mobile"
           class="button-collapse top-nav sidenav-trigger waves-effect waves-light circle hide-on-large-only"><i
                    class="material-icons">menu</i></a>
    </div>
    <ul id="nav-mobile" class="sidenav sidenav-fixed  t-grey5">
        <li class="logo"><a id="logo-container" href="/" class="brand-logo">
                <img id="front-page-logo" src="/framework/assets/img/Core/logo-dat-big.png">
            </a></li>
        <li class="search">
            <div class="search-wrapper">
                <input id="search" placeholder="Search"><i class="material-icons">search</i>
                <div class="search-results"></div>
            </div>
        </li>
        <li class="bold active "><a href="themes.html" class="waves-effect waves-teal tx-white">Themes<span class="new badge"></span></a>

    </ul>
    <div class="patreon-ad  t-grey5"><a href="https://www.t-systems.com.br/" target="_blank" class="waves-effect">2017
            T-Systems</a></div>

</header>

<main>
    <div class="container">
        <div class="row">

        </div>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/framework/assets/js/Core/materialize.min.js"></script>
<script>
    $('.slider').slider();
    $('.parallax').parallax();
    $('.materialboxed').materialbox();
    $('.modal').modal();
    $('.scrollspy').scrollSpy();
    $('.datepicker').datepicker();
    $('.tabs').tabs();
    $('.timepicker').timepicker();
    $('.tooltipped').tooltip();
    $('select').not('.disabled').select();
    $('.sidenav').sidenav();
    $('.tap-target').featureDiscovery();
</script>
</body>
</html>