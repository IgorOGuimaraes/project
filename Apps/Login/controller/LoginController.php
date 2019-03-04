<?php
/**
 * @author Igor de Oliveira Guimarães
 * @version 1.0.0
 * @description This controller is use on login interaction for the core
 */

class LoginController extends Controller
{

    private $_assets_path = '/' . APPLICATION_NAME . '/assets/';

    /**
     * This is default method on the app
     * @author Igor de Oliveira Guimarães
     */
    public function home()
    {
        //Set empty html view
        $this->contentType(
            'clean',
            'Home',
            [
                $this->_assets_path . 'js/Core/materialize.min.js',
                $this->_assets_path . 'js/Apps/Login/home.js'
            ], [
                $this->_assets_path . 'css/Core/materialize.css'
            ]
        );
        //Add login view
        include 'Apps/Login/view/login.php';
    }

    public function login_validate()
    {

        $model = new LoginModel();
        $this->contentType('ajax');

        if(empty($_POST)){
            echo json_encode([
                'Status' => 'Invalid',
                'message' => 'Complete all fields!'
            ]);
        } else {
            $validate = $model->getValidateUser($_POST);

            if(empty($validate)){
                echo json_encode([
                    'Status' => 'Invalid',
                    'message' => 'User invalid!'
                ]);
            } else {

                $user_info = $model->getUserInfo($validate[0]['BasicID']);

                $_SESSION['BasicID'] = $validate[0]['BasicID'];
                $_SESSION['UserID'] = $validate[0]['UserID'];
                $_SESSION['UserName'] = $validate[0]['UserName'];
                $_SESSION['FullName'] = $user_info[0]['Name'];
                $_SESSION['Email'] = $user_info[0]['Email'];
                $_SESSION['Birthday'] = $user_info[0]['Birthday'];

                $response =  json_encode([
                    'Status' => 'Success',
                    'message' => 'Login success!',
                    'location' => '/' . APPLICATION_NAME . '/dashboard/home/',
                ]);

                //Add login view
                include 'Apps/Login/view/login_auth.php';
            }
        }

    }

    public function not_found()
    {

        include 'Apps/Login/view/not_found.php';

    }

    public function internal_error()
    {
        include 'Apps/Login/view/internal_error.php';
    }


    /**
     * This method is used on logout feature to empty user session out of the systems
     * @author Igor de Oliveira Guimarães
     */
    public function logout()
    {

        //Set user session empty
        $_SESSION = [];
        //Kill user session out of coockie
        session_destroy();
        //add Logout view to redirect user
        include 'Apps/Login/view/logout.php';

    }

}