<div class="row" data-step="5"
     data-intro="This is Home Dashboard, Here You Can View Your Apps,Outlook E-mail and Events...and more">
    <div class="col s12 m12 l12 ">
        <div class="gridster">
            <ul>



                <?php



                if(empty($apps[2])){

                    ?>
                    <h2><b>Oh no!</b> there are no apps installed yet! Try going into the store!</h2>

                <?php

                }else{
                    foreach ($apps as $app)
                    {
                        @include_once 'Apps/'.$app['AppName'].'/view/widget.php';
                    }
                }






                /*
                <li class="z-depth-1 t-grey4 hoverable" data-row="1" data-col="1" data-sizex="2" data-sizey="1">
                    <a href="#">
                        <div style="margin-left: 5px; margin-top: 0;" class="row">
                            <div class="col 12">
                                <h6 class="header tx-white">Delivery Order</h6>
                                <h6>Pendent</h6>
                            </div>
                        </div>
                        <div class="col l12 ">
                            <h4 class="header tx-white left"><i
                                        class="material-icons  font-size-1">payment</i></h4>
                            <h4 class="header tx-red right">6</h4>
                        </div>
                    </a>
                </li>
                <li class="z-depth-1 t-grey4 hoverable" data-row="3" data-col="1" data-sizex="1" data-sizey="1">
                    <a href="#">
                        <div style="margin-left: 5px; margin-top: 0;" class="row">
                            <div class="col 12">
                                <h6 class="header black-text">Shopping Cart</h6>
                                <h6>Drafts</h6>
                            </div>
                        </div>
                        <div class="col l12 ">
                            <h4 class="header tx-white left"><i
                                        class="material-icons  font-size-1">mode_edit</i></h4>
                            <h4 class="header tx-grey5 right">1</h4>
                        </div>
                    </a>
                </li>

                <li style="background-image: url('https://envato-shoebox-0.imgix.net/f70b/69ee-2227-42a6-b495-c5c08737f07b/DC2010_35+10303.jpg?w=800&fit=max&mark=https%3A%2F%2Felements-assets.envato.com%2Fstatic%2Fwatermark2.png&markalpha=18&markalign=center%2Cmiddle&auto=compress%2Cformat&s=1ca1b66bccadf9e51d52e9572ba16e44');" class="z-depth-1 t-grey4 responsive-image hoverable" data-row="3" data-col="2" data-sizex="2" data-sizey="1">
                    <a href="#">
                        <div style="margin-left: 5px; margin-top: 0;" class="row">
                            <div class="col 12">
                                <h6 class="header white-text">Knowledge Base</h6>
                                <h6>New Files</h6>
                            </div>
                        </div>
                        <div style="max-height: 65px;" class="col l12 t-light-blue">
                            <h4 class="header tx-white left "><i
                                        class="material-icons  font-size-1">insert_drive_file</i></h4>
                            <h4 class="header tx-red right">85 Files</h4>
                        </div>
                    </a>
                </li>
                <li  class="z-depth-1 t-grey4 hoverable" data-row="1" data-col="2" data-sizex="2" data-sizey="2">
                    <a href="#">
                        <div style="margin-left: 5px; margin-top: 0;" class="row">
                            <div class="col 12">
                                <h6 class="header black-text">Knowledge Base</h6>
                                <h6>New Files</h6>
                            </div>
                        </div>
                        <div class="col l12 ">
                            <h4 class="header tx-white left "><i
                                        class="material-icons  font-size-1">insert_drive_file</i></h4>
                            <h4 class="header tx-red right">85</h4>
                        </div>
                    </a>
                </li>

                <li class="z-depth-1 t-grey4 hoverable" data-row="1" data-col="4" data-sizex="1" data-sizey="1" data-max-sizex="1" data-max-sizey="1"></li>
                <li class="z-depth-1 t-grey4 responsive-image hoverable" style="background-image: url('http://127.0.0.1/framework/assets/img/Core/weather.png');" class="z-depth-1 " data-row="2" data-col="4" data-sizex="2" data-sizey="1"></li>
                <li class="z-depth-1 t-grey4 hoverable" data-row="3" data-col="4" data-sizex="1" data-sizey="1"></li>

                <li class="z-depth-1 t-grey4 hoverable" data-row="1" data-col="5" data-sizex="1" data-sizey="1"></li>
                <li class="z-depth-1 t-grey4 hoverable" data-row="3" data-col="5" data-sizex="1" data-sizey="1"></li>

                <li class="z-depth-1 t-grey4 hoverable" data-row="1" data-col="6" data-sizex="1" data-sizey="1"></li>
                <li class="z-depth-1 t-grey4 hoverable" data-row="2" data-col="6" data-sizex="1" data-sizey="2"></li>
                */?>
            </ul>
        </div>
    </div>
</div>
<div id="dashboard-menu" class="fixed-action-btn horizontal " data-step="6"
     data-intro="Here You Can Add, Delete and Organize Your Dahsboard">
    <a class="btn-floating btn-large">
        <i class="material-icons">menu</i>
    </a>
    <ul>

        <li><a id="dashboard-edit" class="btn-floating t-violet darken-1"><i
                        class="material-icons">mode_edit</i></a></li>
        <li><a id="dashboard-add" class="btn-floating t-petrol"><i class="material-icons">add</i></a></li>
    </ul>
</div>
<div class="tap-target t-dark-blue" data-activates="dashboard-menu">
    <div class="tap-target-content">
        <h5>Customize your dashboard</h5>
        <p>Click here to edit your dashboard and customize your way!</p>
    </div>
</div>



