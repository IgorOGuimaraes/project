<link rel="stylesheet" href="<?php echo "/" . APPLICATION_NAME . "/assets/css/Core/datatables.min.css"; ?>">
<div class="container">
    <div class="row">
        <div class="col l12 m12 s12">
            <h5 class="header tx-magenta">My Apps Administration</h5>
        </div>
    </div>
    <div class="row">
        <div class="col l12 m12 s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Result</span>
                    <table class="striped bordered highlight responsive-table" id="table">
                        <thead>
                        <tr>
                            <th>Application</th>
                            <th>Configuration</th>
                            <th>Access</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($apps as $app) {

                            $app_app_admin = $model->checkAllowApp($_SESSION['automation_UserID'],$app['AppID']);

                           if(@$app_app_admin[0]['IsAdm']){
                               echo '<tr>';
                               echo "<td>{$app['AppName']}</td>";
                               echo "<td><i class='material-icons tx-light-blue'>settings</i> </td>";
                               echo "<td><a href='#' class='edit-access' id='{$app['AppID']}'><i class='material-icons tx-light-blue'>mode_edit</i></a></td>";
                               echo '</tr>';
                           }

                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="edit-access-modal" class="modal">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>
