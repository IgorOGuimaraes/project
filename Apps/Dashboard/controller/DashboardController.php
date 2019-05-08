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
     * Define página de home do dashboard
     */
    public function home()
    {

        $model = new DashboardModel();

        //Set this page with private access
        $this->privateAccess(true);
        //Set content type as html page
        $this->contentType('html', 'Home',
            [
                $this->_assets_path . 'js/Core/highcharts.js',
                $this->_assets_path . 'js/Core/highcharts-more.js',
                $this->_assets_path . 'js/Core/solid-gauge.js',
                $this->_assets_path . 'js/Apps/Dashboard/home.js',
            ], [
                $this->_assets_path . 'css/Apps/Dashboard/dashboard.css',
            ]);

        //add dashboard view
        include 'Apps/Dashboard/view/dashboard.php';

    }

    /**
     * Define página de settings
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
            'Guide', [
                $this->_assets_path . 'js/Apps/Dashboard/guide.js',
            ]
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

        $validate = $model->setPasswordValid(md5($_POST['last_password']));

        if(empty($validate)) {
            $v = false;
        } else if ($validate[0]['ProfessorID'] != $_SESSION['ProfessorID']){
            $v = false;
        }

        if($v){
            if($_POST['new_password'] == $_POST['confirm_new_password']){
                $message = 'Senha atualizada com sucesso!';
                $model->setNewPassword(md5($_POST['new_password']), $_SESSION['ProfessorID']);
            } else {
                $message = 'Nova senha não confere!';
            }
        } else {
            $message = 'Senha Atual Inválida!';
        }

        echo json_encode(['message' => $message]);

    }

    public function new_course ()
    {

        $this->contentType('ajax');
        $model = new DashboardModel();

        $result = $model->getCountCourse($_POST['course_name']);

        if($result[0]['TCourse'] != 0){
            echo json_encode(
                [
                    'status' => 'invalid',
                    'message' => 'Curso já existe!'
                ]
            );
        } else {
            $model->setNewCourse($_POST['course_name']);
            echo json_encode(
                [
                    'status' => 'success',
                    'message' => 'Curso adicionado com sucesso!'
                ]
            );
        }

    }

    public function new_disciplina ()
    {

        $this->contentType('ajax');
        $model = new DashboardModel();

        $result = $model->getCountDisciplina($_POST['disciplina_name']);

        if($result[0]['TDisciplina'] != 0){
            echo json_encode(
                [
                    'status' => 'invalid',
                    'message' => 'Disciplina já existe!'
                ]
            );
        } else {
            $model->setNewDisciplina($_POST['disciplina_name']);
            echo json_encode(
                [
                    'status' => 'success',
                    'message' => 'Disciplina adicionado com sucesso!'
                ]
            );
        }

    }

    public function save_new_professor ()
    {

        $this->contentType('ajax');
        $model = new DashboardModel();

        $name = $model->getCountNomeTeacher($_POST['teacher_name']);
        $email = $model->getCountMailTeacher($_POST['teacher_email']);
        $user = $model->getCountUserTeacher($_POST['user_name']);

        $message = '';

        if($name[0]['nome'] != 0){
            $message = 'Professor já foi adicionado no sistema!';
        } else if ($email[0]['mail'] != 0) {
            $message = 'Email já foi adicionado no sistema!';
        } else if($user[0]['uname'] != 0) {
            $message = 'Usuário já existe no sistema!';
        } else {
            $id_pessoa = $model->setNewPessoa($_POST['teacher_name']);
            $model->setNewTeacher($id_pessoa, $_POST['user_name'], md5('Mudar@1234'), $_POST['teacher_email']);

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
                    'name' => $_POST['teacher_name'],
                    'email' => $_POST['teacher_email']
                )
            );

            $subject = 'Novo usuário!';
            $html = '<h3>Parabéns,</h3><p>Seu usuário foi criado com sucesso.</p><p>User Name: ' .$_POST['user_name']. '</p><p>Password: Mudar@1234</p>';
            $html .= '</br></br><h4>Atenciosamente,</h4><h4>Equipe Gabarit.IO</h4>';
            $from = array('name' => SMTP_EMAIL_GREET, 'email' => SMTP_EMAIL);


            // Create a new instance and send email
            $email = new Email(true, $smtp);
            $email->mail($to, $subject, $html, $from);

            $message = 'Professor adicionado com sucesso!';
        }

        echo json_encode(
            [
                'status' => 'success',
                'message' => $message
            ]
        );

    }


}