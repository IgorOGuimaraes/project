<?php
/**
 * Created by PhpStorm.
 * User: fz388
 * Date: 03/03/2019
 * Time: 20:49
 */

class ManagementSubjectController extends Controller
{

    private $_assets_path = APPLICATION_NAME . '/assets/';

    public function home()
    {
        //Set this page with private access
        $this->privateAccess(true);
        //Set content type as html page
        $this->contentType(
            'html',
            'Management Subject',
            [
                $this->_assets_path . 'js/Core/datatables.min.js',
                $this->_assets_path . 'js/Core/sweetalert2.all.min.js',
                $this->_assets_path . 'js/Apps/ManagementSubject/home.js'
            ], [
                $this->_assets_path . 'css/Core/datatables.min.css',
                $this->_assets_path . 'css/Core/sweetalert2.min.css'
            ]
        );

        //add management subject view
        include 'Apps/ManagementSubject/view/management_subject.php';

    }

    public function load_disciplinas()
    {

        $this->contentType('ajax');
        $model = new ManagementSubjectModel();

        $infos = $model->getAllDisciplinas($_SESSION['ProfessorID']);
        $data = [];

        foreach ($infos as $info) {
            $data[] = [
                "ID Disciplina" => $info['DisciplinaID'],
                "Nome Disciplina" => $info['NomeDisciplina'],
                "Nome Curso" => $info['NameCourse'],
                "Excluir" => '<a href="#" class="delete-disciplina" id="" name="' . $info['DisciplinaCursoID'] . '"><i class="material-icons red-text">delete</i></a>'
            ];
        }

        echo json_encode(
            ['status' => 'success', 'data' => $data]
        );

    }

    public function load_cursos()
    {

        $this->contentType('ajax');
        $model = new ManagementSubjectModel();

        $cursos = $model->getNomeCursos();

        $datas = '';

        foreach ($cursos as $curso){
            $datas .= '<option value="' .$curso['CursoID']. '">' . $curso['NameCourse'] . '</option>';
        }

        echo json_encode(
            ['status' => 'success', 'data' => $datas]
        );

    }

    public function insert_new_disciplina()
    {

        $this->contentType('ajax');
        $model = new ManagementSubjectModel();

        $disciplina = $_POST['nome_disciplina'];
        $curso = $_POST['nome_curso'];

        foreach ($disciplina as $key => $value) {
            $id_disciplina = $model->setNewDisciplina($value);

            $model->setDesciplinaCurso($curso[$key], $id_disciplina, $_SESSION['ProfessorID']);
        }

        echo json_encode(
            ['status' => 'success', 'data' => $curso]
        );

    }

    public function delete_disciplina()
    {

        $this->contentType('ajax');
        $model = new ManagementSubjectModel();

        $disciplinaCursoID = $_POST['disciplinaCursoID'];

        $cursoDisciplina = $model->getCursoDisciplina($disciplinaCursoID);

        $model->deleteDisciplinaCurso($disciplinaCursoID);
        $model->deleteDisciplina($cursoDisciplina[0]['DisciplinaID']);

        echo json_encode(['status' => 'success', 'message' => 'Disciplina excluída com sucesso!', 'debug' => $cursoDisciplina]);

    }

}