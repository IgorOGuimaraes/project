<?php

/**
 * Class DashboardController
 */
class DashboardController extends Controller
{

    /**
     * @var string
     */
    private $_assets_path = APPLICATION_NAME . '/assets/';

    /**
     *
     */
    public function home()
    {

        $model = new DashboardModel();

        //Set this page with private access
        $this->privateAccess(true);
        //Set content type as html page
        $this->contentType('html', 'Home',
            [
                $this->_assets_path . 'js/Apps/Dashboard/home.js'
            ]);

        //add dashboard view
        include 'Apps/Dashboard/view/dashboard.php';

    }

    /**
     *
     */
    public function settings()
    {

        $model = new DashboardModel();

        //Set this page with private access
        $this->privateAccess(true);
        //Set content type as html page
        $this->contentType(
            'html',
            'My Settings',
            [
                $this->_assets_path . 'js/Apps/Dashboard/settings.js',
                $this->_assets_path . 'js/Core/sweetalert2.all.min.js',
            ],
            [
                $this->_assets_path . 'css/Core/sweetalert2.min.css'
            ]
        );

        //add dashboard view
        include 'Apps/Dashboard/view/settings.php';

    }

    public function guide()
    {

        //Set content type as html page
        $this->contentType(
            'html',
            'Guide'
        );

        //add dashboard view
        include 'Apps/Dashboard/view/guide.php';

    }

    public function new_password ()
    {

        $this->contentType('ajax');
        $model = new DashboardModel();
        $v = true;
        $message = '';

        $validate = $model->setPasswordValid($_POST['last_password']);

        if(empty($validate)) {
            $v = false;
        } else if ($validate[0]['ProfessorID'] != $_SESSION['ProfessorID']){
            $v = false;
        }

        if($v){
            if($_POST['new_password'] == $_POST['confirm_new_password']){
                $message = 'Update password successful!';
                $model->setNewPassword($_POST['new_password'], $_SESSION['ProfessorID']);
            } else {
                $message = 'New password don\'t confirmed!';
            }
        } else {
            $message = 'Last Password Invalid!';
        }

        echo json_encode(['message' => $message]);

    }


}