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

    public function export_notas()
    {

        date_default_timezone_set("America/Sao_Paulo");
        $model = new ManagementStudentModel();

        $info = [
            'periodo-add-export' => $_GET['periodo'],
            'ano-export' => $_GET['ano'],
            'semestre-export' => $_GET['semestre'],
            'nome_curso_export' => $_GET['curso'],
            'disciplina-export' => $_GET['disciplina']
        ];

        $notasAlunos = $model->getNotasExport($info);
        $data = [];

        if(!empty($notasAlunos)){
            foreach ($notasAlunos as $notas){
                $data[$notas['NomeAluno']][] = [
                    'Nome Aluno' => $notas['NomeAluno'],
                    'RA Aluno' => $notas['RAAluno'],
                    'Prova' => $notas['Prova'],
                    'Nota' => $notas['NotaAluno']
                ];
            }
        }

        //==========================[CREATE EXCEL]==========================
        require_once('Core/vendor/PHPExcel.php');

        $objPHPExcel = new PHPExcel();

        $styleArray = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '000000'),
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle('A1:J2')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->setShowGridlines(true);

        $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getAlignment()->applyFromArray(
            array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
        );

        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->getStyle('A2:A17')->getFont()->setBold(true);

        //==========================[Columns identification]==========================
        if(!empty($notasAlunos)){
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 1, $notasAlunos[0]['AnoTurma'] . $notasAlunos[0]['SemestreTurma']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 1, $notasAlunos[0]['NomeDisciplina']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 1, $notasAlunos[0]['PeriodoTurma']);
        }

        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 2, "RA");
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 2, "ALUNO");
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 2, "P1");
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, 2, "P2");
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, 2, "P3");
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, 2, "T");
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, 2, "MEDIA");

        $objPHPExcel->getActiveSheet()->setTitle('Notas Alunos');

        //==========================[Input exam notes]==========================
        if(!empty($data)){
            $row_axis = 3;
            $col_axis = 0;

            $p1 = 0;
            $p2 = 0;
            $p3 = 0;
            $media = 0;

            foreach ($data as $key => $value) {

                //Columns values
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col_axis, $row_axis, $value[0]['RA Aluno'] . ' ');
                $col_axis++;
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col_axis, $row_axis, $value[0]['Nome Aluno']);

                foreach($value as $aluno){

                    if($aluno['Prova'] == 'P1'){

                        $p1 = $aluno['Nota'];
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $row_axis, str_replace('.', ',', $aluno['Nota']));

                    } else if($aluno['Prova'] == 'P2'){

                        $p2 = $aluno['Nota'];
                        $media = ($p1 + $p2) / 2;

                        $media = number_format($media, 2, '.', ' ');

                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $row_axis, str_replace('.', ',', $aluno['Nota']));
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $row_axis, str_replace('.', ',', $media));

                    } else if($aluno['Prova'] == 'P3'){

                        $p3 = $aluno['Nota'];
                        if($p1 >= $p2){$media = ($p1 + $p3) / 2;}
                        else {$media = ($p2 + $p3) / 2;}

                        $media = number_format($media, 2, '.', ' ');

                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $row_axis, str_replace('.', ',', $aluno['Nota']));
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $row_axis, str_replace('.', ',', $media));

                    }

                }

                $row_axis++;
                $col_axis = 0;

            }

            $nCols = 2;
            foreach (range(0, $nCols) as $col) {
                $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);
            }

            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(9);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(9);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(9);

        }


        //Gerar e Salvar o arquivo Excel
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Notas - '. date('d/m/y H:m:s') .'.xlsx"'); /*-- $filename is  xsl filename ---*/
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');

    }

}