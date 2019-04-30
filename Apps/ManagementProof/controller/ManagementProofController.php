<?php

class ManagementProofController extends Controller
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
                $this->_assets_path . 'js/Core/sweetalert2.all.min.js',
                $this->_assets_path . 'js/Apps/ManagementProof/home.js'
            ], [
                $this->_assets_path . 'css/Core/datatables.min.css',
                $this->_assets_path . 'css/Core/sweetalert2.min.css'
            ]
        );

        //add management subject view
        include 'Apps/ManagementProof/view/home.php';

    }

    public function load_prova()
    {

        $this->contentType('ajax');
        $model = new ManagementProofModel();

        $result = $model->loadProofDatatable($_SESSION['ProfessorID']);
        $data = [];

        foreach ($result as $prova){
            $data[] = [
                'Prova Oficial' => $prova['ProvaOficial'],
                'Versão de Prova' => $prova['VersaoProva'],
                'Data Prova' => $prova['DataProva'],
                'Periodo' => $prova['Periodo'],
                'Ano' => $prova['Ano'],
                'Semestre' => $prova['Semestre'],
                'Excluir' => '<a href="#" class="delete-prova" id="' .$prova['ProvaID']. '" name="' . $prova['ProvaID'] . '"><i class="material-icons red-text">delete</i></a>',
                'Editar' => '<a href="#" class="open-view-info" id="' .$prova['ProvaID']. '" name="' . $prova['ProvaID'] . '"><i class="material-icons blue-text">launch</i></a>'
            ];
        }


        echo json_encode(['data' => $data]);
    }

    public function load_disciplina_curso()
    {

        $this->contentType('ajax');
        $model = new ManagementProofModel();

        $disciplina = $model->getDisciplina();
        $curso = $model->getCurso();

        echo json_encode(['disciplina' => $disciplina, 'curso' => $curso]);

    }

    public function save_new_proof()
    {

        $this->contentType('ajax');
        $model = new ManagementProofModel();

        $periodoProof = $_POST['periodo_proof'];
        $anoProof = $_POST['ano_proof'];
        $semestreProof = $_POST['semestre_proof'];
        $disciplinaProof = $_POST['disciplina_proof'];
        $cursoProof = $_POST['curso_proof'];

        $turmaInfo = $model->getTurma($periodoProof, $anoProof, $semestreProof, $disciplinaProof, $cursoProof, $_SESSION['ProfessorID']);

        if(empty($turmaInfo)) {
            echo json_encode([
                'status' => 'Error',
                'message' => 'Turma não localizada, verificar Periodo / Semestre / Ano!'
            ]);
        } else {

            $countProva = $model->getCountProva($turmaInfo[0]['TurmaID']);

            if(!empty($countProva)) {$versaoProva = (int)$countProva[0]['CountProof']+1;}
            else {$versaoProva = 1;}

            $dataProva = $_POST['date_proof'];
            $officialProof = $_POST['official_proof'];
            $questoesProof = $_POST['questoes_proof'];
            $alternativasProof = $_POST['alternativas_proof'];
            $pesoProof = $_POST['peso_proof'];
            $responstaProof = $_POST['resposta_questao'];

            $formatoGabarito = [
                'Qtd_questoes' => $questoesProof,
                'Qtd_alternativas' => $alternativasProof
            ];

            $respostaCorreta = [];
            $i = 1;

            foreach($responstaProof as $key => $value) {
                $respostaCorreta[$i] = [
                    'Resposta Correta' => $value,
                    'Peso Questao' => $pesoProof[$key]
                ];

                $i++;
            }

            $model->setNewProof($turmaInfo[0]['TurmaID'], $dataProva, json_encode($respostaCorreta), $versaoProva, $officialProof, json_encode($formatoGabarito));

            echo json_encode([
                'status' => 'success',
                'message' => 'Prova salva com sucesso!'
            ]);

        }

    }

    public function delete_prova()
    {

        $this->contentType('ajax');
        $model = new ManagementProofModel();

        $model->deleteProof($_POST['ProvaID']);

        echo json_encode([
            'status' => 'success',
            'message' => 'Prova excluida com sucesso!']);

    }

    public function render_gabarit()
    {

        $this->contentType('ajax');
        $model = new ManagementProofModel();

        $prova = $model->getProva($_POST['GabaritoID']);

        echo json_encode([
            'status' => 'success',
            'prova' => json_decode($prova[0]['FormatoGabarito'])
        ]);

    }

}