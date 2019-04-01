<?php
/**
 * Created by PhpStorm.
 * User: fz388
 * Date: 03/03/2019
 * Time: 20:29
 */

class ManagementStudentController extends Controller
{

    private $_assets_path = APPLICATION_NAME . '/assets/';

    public function home()
    {

        $model = new ManagementStudentModel();

        //Set this page with private access
        $this->privateAccess(true);
        //Set content type as html page
        $this->contentType('html', 'Management Student',
            [
                $this->_assets_path . 'js/Core/datatables.min.js',
                $this->_assets_path . 'js/Core/sweetalert2.all.min.js',
                $this->_assets_path . 'js/Apps/ManagementStudent/management.js'
            ], [
                $this->_assets_path . 'css/Core/datatables.min.css',
                $this->_assets_path . 'css/Core/sweetalert2.min.css'
            ]);

        //add dashboard view
        include 'Apps/ManagementStudent/view/management.php';

    }

    public function load_alunos()
    {

        $model = new ManagementStudentModel();
        $this->contentType('ajax');

        $data = [];
        $alunos = $model->getAlunos();

        if(!empty($alunos)){
            foreach ($alunos as $aluno){
                $data [] = [
                    'RA Aluno' => $aluno['RA'],
                    'Nome Aluno' => $aluno['NomePessoa'],
                    'Editar' => '<a href="#" class="" id="open-view-info" name="' . $aluno['AlunoID'] . '"><i class="material-icons blue-text">launch</i></a>'
                ];
            }
        }

        echo json_encode(
            [
                'Status' => 'Success',
                'data' => $data
            ]
        );

    }

    public function new_aluno()
    {

        $this->contentType('ajax');
        $model = new ManagementStudentModel();

        $nome_aluno = $_POST['nome_aluno'];
        $ra_aluno = $_POST['ra_aluno'];

        $data = [];

        foreach ($nome_aluno as $key => $value)
        {
            $data [] = [
                'Nome' => $value,
                'RA' => $ra_aluno[$key]
            ];

            $id_pessoa = $model->setNewPessoa($value);
            $id_aluno = $model->setNewAluno($id_pessoa, $ra_aluno[$key]);
        }

        echo json_encode(
            [
                'status' => 'success',
                'data' => $data,
                'message' => 'Aluno(s) salvos com sucesso!'
            ]
        );

    }
}