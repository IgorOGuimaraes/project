<?php
/**
 * Created by PhpStorm.
 * User: fz388
 * Date: 03/03/2019
 * Time: 20:29
 */

class ManagementStudentController extends Controller
{

    private $_assets_path = '/' . APPLICATION_NAME . '/assets/';

    public function home()
    {

        $model = new ManagementStudentModel();

        //Set this page with private access
        $this->privateAccess(true);
        //Set content type as html page
        $this->contentType('html', 'Management Student',
            [
                $this->_assets_path . '/js/Apps/ManagementStudent/management.js'
            ]);

        //add dashboard view
        include 'Apps/ManagementStudent/view/management.php';

    }

}