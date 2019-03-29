<?php
$url_to_array = explode("/", $_SERVER['REQUEST_URI']);
?>
</main>
<script src="<?php echo APPLICATION_NAME; ?>/assets/js/Core/jquery-3.3.1.min.js"></script>
<script src="<?php echo APPLICATION_NAME; ?>/assets/js/Core/materialize.min.js"></script>
<script src="<?php echo APPLICATION_NAME; ?>/assets/js/Core/jquery-ui.js"></script>
<script src="<?php echo APPLICATION_NAME; ?>/assets/js/Core/jquery.gridster.min.js"></script>
<script src="<?php echo APPLICATION_NAME; ?>/assets/js/Core/intro.min.js"></script>
<script src="<?php echo APPLICATION_NAME; ?>/assets/js/Core/app.js"></script>
<script src="<?php echo APPLICATION_NAME; ?>/assets/js/Core/loader.js"></script>
<?php


?>

<?php

if(!empty($scripts)){
    foreach ($scripts as $script)
        echo '<script src="'.$script.'" type="application/javascript" ></script>';
}

?>

<div id="progress-loader" class="modal-overlay" style="z-index: 1002; opacity: 0.9; cursor: progress;">
    <div  style="left:25%; top:50%; z-index: 9999999991; max-width: 50%;" class="progress">
        <div id="progress-loader-percent" style="z-index: 9999999998;"></div>
    </div>
    <h5 id="progress-loader-content" class="white-text right header" style="left:25%; top:50%; z-index: 9999999991; max-width: 50%;position:absolute;"></h5>
</div>
<div id="block-loader" class="modal-overlay" style="z-index: 1002; opacity: 0.9;">
    <a style="left:50%; top:50%; z-index: 999999999;" class="white-text">test</a>
    <div style="left:40%; top:50%; z-index: 9999999991;" class="preloader-wrapper big active">

        <div class="spinner-layer spinner-blue">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>

        <div class="spinner-layer spinner-red">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>

        <div class="spinner-layer spinner-yellow">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>

        <div class="spinner-layer spinner-green">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

