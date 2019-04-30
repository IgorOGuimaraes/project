<?php

class ManagementClassController extends Controller
{

    private $_assets_path = APPLICATION_NAME . '/assets/';

    public function home()
    {

        //Set this page with private access
        $this->privateAccess(true);
        //Set content type as html page
        $this->contentType(
            'html',
            'Management Class',
            [
                $this->_assets_path . 'js/Core/datatables.min.js',
                $this->_assets_path . 'js/Core/sweetalert2.all.min.js',
                $this->_assets_path . 'js/Apps/ManagementClass/home.js'
            ], [
                $this->_assets_path . 'css/Core/datatables.min.css',
                $this->_assets_path . 'css/Core/sweetalert2.min.css'
            ]
        );

        //add management subject view
        include 'Apps/ManagementClass/view/home.php';

    }

    public function load_turma()
    {

        $this->contentType('ajax');
        $model = new ManagementClassModel();

        $result = $model->getTurma($_SESSION['ProfessorID']);
        $data = [];

        if(!empty($result)){
            foreach ($result as $turmas){
                $data[] = [
                    'Ano' => $turmas['Ano'],
                    'Semestre' => $turmas['Semestre'],
                    'Periodo' => $turmas['Periodo'],
                    'Nome do Curso' => $turmas['NomeCurso'],
                    'Nome da Materia' => $turmas['NomeDisciplina'],
                    'Deletar' => '<a href="#" class="delete-turma" id="' .$turmas['DisciplinaCursoID']. '" name="' . $turmas['TurmaID'] . '"><i class="material-icons red-text">delete</i></a>'
                ];
            }
        }

        echo json_encode(['data' => $data]);

    }

    public function delete_turma()
    {

        $this->contentType('ajax');
        $model = new ManagementClassModel();

        $model->deleteTurma($_POST['turma_ID']);

        echo json_encode(['message' => 'Turma excluida com sucesso!']);

    }

    public function infos_disciplina_curso()
    {

        $this->contentType('ajax');
        $model = new ManagementClassModel();

        $data = $model->getDisciplina();
        $data1 = $model->getCurso();

        echo json_encode(['data' => $data, 'data1' => $data1]);

    }

    public function insert_new_class()
    {

        $this->contentType('ajax');
        $model = new ManagementClassModel();

        $disciplina = $_POST['disciplina-add'];
        $curso = $_POST['nome_curso'];
        $periodo = $_POST['periodo-add'];

        $validate = $model->getCursoDisciplina($disciplina, $curso, $_SESSION['ProfessorID']);

        if(empty($validate)){
            $validate = $model->setCursoDisciplina($disciplina, $curso, $_SESSION['ProfessorID']);
        }

        $year = date('Y');
        $mounth = date('m');
        $semester = 1;

        if($mounth >= 7) $semester = 2;

        $model->setNewTurma($validate[0]['DisciplinaCursoID'], $periodo, $year, $semester);

        echo json_encode(['status' => 'success']);

    }

}