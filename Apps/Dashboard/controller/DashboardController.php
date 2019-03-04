<?php

/**
 * Class DashboardController
 */
class DashboardController extends Controller
{

    /**
     * @var string
     */
    private $_assets_path = '/' . APPLICATION_NAME . '/assets/';

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
                $this->_assets_path . '/js/Apps/Dashboard/home.js'
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
                $this->_assets_path . 'js/Core/datatables.min.js',
                $this->_assets_path . 'js/Apps/Dashboard/settings.js',
            ]
        );

        $apps = $model->getUserAppsName($_SESSION['automation_UserID']);

        //add dashboard view
        include 'Apps/Dashboard/view/settings.php';

    }


    public function viewAccess()
    {

        $this->contentType('ajax', '');
        $model = new DashboardModel();
        $result = $model->getUserPermissionByApp($_POST['id']);
        echo json_encode($result);


    }


}