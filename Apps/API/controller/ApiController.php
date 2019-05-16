<?php
/**
 * @author Igor de Oliveira Guimarães
 * @version 1.0.0
 * @description This controller is use on login interaction for the core
 */

class ApiController extends Controller
{

    /**
     * This is default method on the app
     * @author Igor de Oliveira Guimarães
     */
    public function home()
    {
        //Set empty html view
        $this->contentType('clean');
        $this->privateAccess(false);

        $v = $this::loginApplication();

        if ($v) { $response = 'Login efetuado com sucesso!'; }
        else { $response = 'Usuário ou senha invalidos!'; }

        //Add login view
        include 'Apps/API/view/home.php';
    }

    public function loginApplication()
    {

//        $_POST['user-name'] = 'Admin_all';
//        $_POST['pass-user'] = '10e4ba1a5462ced3f9b401260f9bf209';

        $this->contentType('json');
        $model = new ApiModel();

        $validate = $model->getValidateUser($_POST);

        if(empty($validate)) {

            echo json_encode($result = [
                'Status' => 'Invalid',
                'message' => 'Usuário ou senha inválidos!'
            ]);

        } else {

            $user_info = $model->getUserInfo($validate[0]['PessoaID']);

            echo json_encode($result = [
                'Status' => 'Success',
                'message' => 'Redirecionando .....',
                'ProfessorID' => $validate[0]['ProfessorID'],
                'PessoaID' => $validate[0]['PessoaID'],
                'UserName' => $validate[0]['UserName'],
                'Email' => $validate[0]['Email'],
                'NomePessoa' => $user_info[0]['NomePessoa']
            ]);
        }

    }

    public function answersProof()
    {

        $this->contentType('json');
        $model = new ApiModel();

//        $_POST['user-name'] = 'Admin_all';
//        $_POST['pass-user'] = '10e4ba1a5462ced3f9b401260f9bf209';
//        $_POST['ProvaID'] = '2';

        $validate = $model->getValidateUser($_POST);

        if(empty($validate)) {

            echo json_encode( $result = [
                'Status' => 'Invalid',
                'message' => 'Usuário ou senha inválidos!'
            ]);

        } else {

            $user_info = $model->getAnswersProof($validate[0]['ProfessorID'], $_POST);

            if(isset($user_info[0]['Respostas'])) {$respostas = $user_info[0]['Respostas'];} else {$respostas = '';}
            if(isset($user_info[0]['Gabarito'])) {$gabarito = $user_info[0]['Gabarito'];} else {$gabarito = '';}

            echo json_encode( $result = [
                'Status' => 'Success',
                'message' => 'Segue formato e respostas da prova!',
                'Respostas' => $respostas,
                'Gabarito' => $gabarito
            ]);
        }
    }

    public function saveAnswersStudent()
    {

        $this->contentType('json');
        $model = new ApiModel();

//        $_POST['user-name'] = 'Admin_all';
//        $_POST['pass-user'] = '10e4ba1a5462ced3f9b401260f9bf209';
//        $_POST['ProvaID'] = '1';
//        $_POST['AlunoID'] = '2';
//        $_POST['RespostaAluno'] = [];
//        $_POST['NotaAluno'] = 5.60;


        $validate = $model->getValidateUser($_POST);

        if(empty($validate)) {

            echo json_encode( $result = [
                'Status' => 'Invalid',
                'message' => 'Usuário ou senha inválidos!'
            ]);

        } else {

            $user_info = $model->getAnswersProof($validate[0]['ProfessorID'], $_POST);

            if(empty($user_info)){
                echo json_encode( $result = [
                    'Status' => 'Invalid',
                    'message' => 'Prova não localizada para esse usuário!'
                ]);
            } else {

                $respostaId = $model->setAnswersStudent($_POST);

                echo json_encode( $result = [
                    'Status' => 'Success',
                    'message' => 'Respostas e nota salva!',
                    'respostaId' => $respostaId
                ]);

            }

        }

    }

}