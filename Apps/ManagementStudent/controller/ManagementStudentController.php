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
                $this->_assets_path . 'js/Apps/ManagementStudent/management.js?v=2'
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
                    'Deletar' => '<a href="#" class="delete-aluno" id="' .$aluno['PessoaID']. '" name="' . $aluno['AlunoID'] . '"><i class="material-icons red-text">delete</i></a>',
                    'Disciplinas' => '<a href="#" class="open-view-disciplinas" id="' .$aluno['NomePessoa']. '" name="' . $aluno['AlunoID'] . '"><i class="material-icons blue-text">launch</i></a>',
                    'Editar' => '<a href="#" class="open-view-info" id="" name="' . $aluno['AlunoID'] . '"><i class="material-icons blue-text">launch</i></a>'
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

    public function view_aluno()
    {

        $this->contentType('ajax');
        $model = new ManagementStudentModel();

        $data = $model->getAluno($_POST['alunoID']);

        echo json_encode(['status' => 'success', 'data' => $data]);

    }

    public function delete_aluno()
    {

        $this->contentType('ajax');
        $model = new ManagementStudentModel();

        $model->deleteAluno($_POST['idAluno']);
        $model->deletePessoa($_POST['idPessoa']);

        echo json_encode(['message' => 'Aluno excluido com sucesso!']);

    }

    public function infos_disciplina_curso()
    {

        $this->contentType('ajax');
        $model = new ManagementStudentModel();

        $data = $model->getDisciplina();
        $data1 = $model->getCurso();

        echo json_encode(['data' => $data, 'data1' => $data1]);

    }

    public function load_disciplinas_aluno()
    {

        $this->contentType('ajax');
        $model = new ManagementStudentModel();

        $data = [];

        $result = $model->getDisciplinas($_GET['id_aluno']);

        foreach ($result as $key => $value) {
            $data [] = [
                'Curso' => $value['NomeCurso'],
                'Disciplina' => $value['NomeDisciplina'],
                'Periodo' => $value['Periodo'],
                'Ano' => $value['Ano'],
                'Semestre' => $value['Semestre'],
                'Notas' => '<a href="#" class="open-notas-turma" id="' .$_GET['id_aluno']. '" name="' . $value['TurmaID'] . '"><i class="material-icons">launch</i></a>',
                'Deletar' => '<a href="#" class="delete-turma" id="' .$_GET['id_aluno']. '" name="' . $value['TurmaID'] . '"><i class="material-icons red-text">delete</i></a>',
            ];
        }

        echo json_encode(['data' => $data]);

    }

    public function add_disciplina_aluno()
    {

        $this->contentType('ajax');
        $model = new ManagementStudentModel();

        $disciplina = $_POST['disciplina-add'];
        $curso = $_POST['nome_curso'];
        $periodo = $_POST['periodo-add'];
        $alunoID = $_POST['id_aluno'];

        $validate = $model->getCursoDisciplina($disciplina, $curso);

        if(empty($validate)){
            echo json_encode(['status' => 'invalid', 'message' => 'Matéria não associada a este curso/periodo!']);
            die;
        }

        $year = date('Y');
        $mounth = date('m');
        $semester = 1;

        if($mounth >= 7) $semester = 2;

        $turmaID = $model->getTurma($validate[0]['DisciplinaCursoID'], $periodo, $year, $semester);

        if (empty($turmaID)){
            echo json_encode(['status' => 'invalid', 'message' => 'Matéria não associada a este curso/turma!']);
            die;
        }
        $model->setNewTurma($alunoID, $turmaID[0]['TurmaID']);

        echo json_encode(['status' => 'success', 'message' => 'Disciplina associada ao aluno!', 'debug' => $turmaID]);

    }

    public function delete_disciplina()
    {

        $this->contentType('ajax');
        $model = new ManagementStudentModel();

        $model->deleteTurma($_POST['idTurma'], $_POST['idAluno']);

        echo json_encode(['message' => 'Disciplina excluida com sucesso!']);

    }

    public function load_notas_alunos()
    {

        $this->contentType('ajax');
        $model = new ManagementStudentModel();

        $data = $model->getNotas($_POST['alunoID'], $_POST['turmaID']);

        echo json_encode(['data' => $data]);

    }

}