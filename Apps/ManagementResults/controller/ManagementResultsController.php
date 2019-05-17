<?php

class ManagementResultsController extends Controller
{

    private $_assets_path = APPLICATION_NAME . '/assets/';

    public function home()
    {

        //Set this page with private access
        $this->privateAccess(true);
        //Set content type as html page
        $this->contentType(
            'html',
            'Management Proof',
            [
                $this->_assets_path . 'js/Core/datatables.min.js',
                $this->_assets_path . 'js/Apps/ManagementResults/home.js'
            ], [
                $this->_assets_path . 'css/Core/datatables.min.css'
            ]
        );

        //add management subject view
        include 'Apps/ManagementResults/view/home.php';

    }

    public function load_notas()
    {

        $this->contentType('ajax');
        $model = new ManagementResultsModel();

        $info = [
            'periodo-add-export' => $_GET['periodo'],
            'ano-export' => $_GET['ano'],
            'semestre-export' => $_GET['semestre'],
            'nome_curso_export' => $_GET['nomeCurso'],
            'disciplina-export' => $_GET['disciplina']
        ];

        if($info['periodo-add-export']=='' || $info['ano-export']=='' || $info['semestre-export']=='' || $info['nome_curso_export']=='' || $info['disciplina-export']=='') {
            $data = [];
            echo json_encode(['data' => $data]);
            die;
        } else {
            $result = $model->getNotas($info);

            $data = [];

            foreach($result as $r){
                $data[] = [
                    "RA Aluno" => $r['RAAluno'],
                    "Nome Aluno" => $r['NomeAluno'],
                    "Nota" => $r['NotaAluno'],
                    "Prova Oficial" => $r['Prova']
                ];
            }

            echo json_encode(['data' => $data]);
        }
    }

    public function infos_disciplina_curso()
    {

        $this->contentType('ajax');
        $model = new ManagementResultsModel();

        $data = $model->getDisciplina();
        $data1 = $model->getCurso();

        echo json_encode(['data' => $data, 'data1' => $data1]);

    }

    public function export_notas()
    {

        date_default_timezone_set("America/Sao_Paulo");
        $model = new ManagementResultsModel();

        $info = [
            'periodo-add-export' => $_GET['periodo'],
            'ano-export' => $_GET['ano'],
            'semestre-export' => $_GET['semestre'],
            'nome_curso_export' => $_GET['curso'],
            'disciplina-export' => $_GET['disciplina']
        ];

        $notasAlunos = $model->getNotas($info);
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