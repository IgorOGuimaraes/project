<?php
/**
 * @author Igor de Oliveira Guimarães
 * @version 1.0.0
 * @description This controller is use on login interaction for the core
 */


class LoginController extends Controller
{

    private $_assets_path = APPLICATION_NAME . '/assets/';
    private $_password = '';

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

    public function reset_password()
    {

        $this->contentType(
            'clean',
            'Password Reset',
            [
                $this->_assets_path . 'js/Apps/Login/reset.js'
            ]
        );

        //Add reset view
        include 'Apps/Login/view/reset_password.php';

    }

    public function submit_new_password ()
    {

        $this->contentType('ajax');
        $model = new LoginModel();

        $validate = $model->getEmailTeacher($_POST['mail']);

        if(!empty($validate[0]['NomePessoa'])){
            include 'Core/vendor/Email.php';

            // Set up requerid parameters
            $smtp = array (
                'debug'     => 2,
                'host'      => SMTP_RELAY,
                'auth'      => true,
                'username'  => SMTP_EMAIL_USERNAME,
                'password'  => SMTP_EMAIL_PASSWORD,
                'secure'    => 'tls',
                'port'      => SMTP_PORT
            );

            $to = array(
                array(
                    'name' => $validate[0]['NomePessoa'],
                    'email' => $_POST['mail']
                )
            );

            $pass = $this->gerar_senha(8, true, true, true, true);
            $model->setNewPasswor($_POST['mail'], md5($pass));

            $subject = 'Reset de senha!';
            $html = '<h3>Sua nova senha foi gerada.</h3><p>User Name: ' .$validate[0]['UserName']. '</p><p>New password: ' . $pass .'</p>';
            $html .= '</br></br><h4>Atenciosamente,</h4><h4>Equipe Gabarit.IO</h4>';
            $from = array('name' => SMTP_EMAIL_GREET, 'email' => SMTP_EMAIL);


            // Create a new instance and send email
            $email = new Email(true, $smtp);
            $email->mail($to, $subject, $html, $from);

            echo json_encode(['status' => 'success', 'message' => 'Nova senha enviada!']);

        } else {
            echo json_encode(['status' => 'success', 'message' => 'Usuário não localizado!']);
            die();
        }

    }

    function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
        $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
        $nu = "0123456789"; // $nu contem os números
        $si = "!@#$%&*_+="; // $si contem os símbolos

        if ($maiusculas){
            // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
            $this->_password .= str_shuffle($ma);
        }

        if ($minusculas){
            // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
            $this->_password .= str_shuffle($mi);
        }

        if ($numeros){
            // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
            $this->_password .= str_shuffle($nu);
        }

        if ($simbolos){
            // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
            $this->_password .= str_shuffle($si);
        }

        // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
        return substr(str_shuffle($this->_password),0,$tamanho);
    }

    public function login_validate()
    {

        $model = new LoginModel();
        $this->contentType('ajax');

        if(empty($_POST)){
            echo json_encode([
                'Status' => 'Invalid',
                'message' => 'Preencha todos os campos!'
            ]);
        } else {
            $validate = $model->getValidateUser($_POST);

            if(empty($validate)){
                echo json_encode([
                    'Status' => 'Invalid',
                    'message' => 'Usuário ou senha inválidos!'
                ]);
            } else {

                $user_info = $model->getUserInfo($validate[0]['PessoaID']);

                $_SESSION['ProfessorID'] = $validate[0]['ProfessorID'];
                $_SESSION['PessoaID'] = $validate[0]['PessoaID'];
                $_SESSION['UserName'] = $validate[0]['UserName'];
                $_SESSION['Email'] = $validate[0]['Email'];
                $_SESSION['FullName'] = $user_info[0]['NomePessoa'];

                $response =  json_encode([
                    'Status' => 'Success',
                    'message' => 'Redirecionando .....',
                    'location' => APPLICATION_NAME . '/dashboard/home/',
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