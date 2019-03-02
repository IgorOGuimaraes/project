<nav class="nav-extended ">
    <div class="categories-wrapper" style="height: 0px !important; ">
        <div class="categories-container t-magenta">
            <ul class="categories db">
                <li id="click-me" class="k"><a href="#all">All</a></li>
                <li><a href="#letter-a">A</a></li>
                <li><a href="#letter-b">B</a></li>
                <li><a href="#letter-c">C</a></li>
                <li><a href="#letter-d">D</a></li>
                <li><a href="#letter-f">F</a></li>
                <li><a href="#letter-i">I</a></li>
                <li><a href="#letter-k">K</a></li>
                <li><a href="#letter-l">L</a></li>
                <li><a href="#letter-n">N</a></li>
                <li><a href="#letter-o">O</a></li>
                <li><a href="#letter-p">P</a></li>
                <li><a href="#letter-s">S</a></li>
                <li><a href="#letter-v">V</a></li>

            </ul>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col l12">
        <div id="portfolio" class="cx gray">
            <br><br><br>
            <div class="db">
                <div class="b e">

                    <?php foreach ($apps as $app) {?>


                        <div class="d hx hf gu gallery-item gallery-expand ce letter-<?php echo strtolower(substr($app['AppName'],0,1)); ?>">
                            <div class="gallery-curve-wrapper">
                                <a class="gallery-cover gray"><img class="responsive-img" src="<?php echo $app['AppImage']; ?>" alt="placeholder" crossOrigin="anonymous"></a>
                                <div class="gallery-header">
                                    <span><?php echo $app['AppVirtualName']; ?></span>
                                </div>
                                <div class="gallery-body">
                                    <div class="title-wrapper">
                                        <h3><?php echo $app['AppVirtualName']; ?></h3>
                                        <?php


                                        if(!empty($model->checkAllowApp($_SESSION['automation_UserID'], $app['AppID']))){
                                            $check_installed_app = $model->userAppsInstalledRand($_SESSION['automation_UserID'], $app['AppID']);
                                            if (empty($check_installed_app))
                                                echo '<a class="btn waves-effect waves-light install-app" name="' . strtolower($app['AppName']) . '" id="' . $app['AppID'] . '" >INSTALL</a>';
                                            else
                                                echo '<a  class="t-green disabled btn waves-effect waves-light">INSTALLED</a>';
                                        }else{

                                            echo '<a class="disabled btn-floating btn waves-effect waves-light" >Unavailable</a>';
                                        }

                                        ?>
                                    </div>
                                    <?php echo $app['AppDescription']; ?>
                                    <div class="carousel-wrapper">
                                        <div class="t carousel">
                                            <?php

                                            $images = explode(',',$app['AppScreenshots']);

                                            $counter =0;
                                            foreach($images as $image){

                                                echo '<a class="carousel-item" href="#'.$counter.'-img!"><img src="'.$image.'" crossOrigin="anonymous"></a>';

                                                $counter++;
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-action">
                                    <a target="_blank" data-position="top" data-tooltip="Click for App Documentation" href="<?php echo $app['YamDocument'];?>" class="btn-floating tooltipped btn-large waves-effect waves-light"><i class="material-icons">help_outline</i></a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
.