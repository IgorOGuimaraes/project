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

}