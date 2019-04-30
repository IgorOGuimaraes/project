<?php
$model = new Model();

$GabaritoID = explode("/", $_SERVER['REQUEST_URI'])[4];
$proof_info = $model->connection->query("SELECT
p.ProvaID AS ProvaID,
p.FormatoGabarito AS FormatoGabarito,
p.DataProva AS DataProva,
p.VersaoProva AS VersaoProva,
p.ProvaOficial AS ProvaOficial,
t.TurmaID AS TurmaID,
t.Periodo AS Periodo,
t.Ano AS Ano,
t.Semestre AS Semestre,
cur.NomeCurso AS CursoNome,
cur.CursoID AS CursoID,
d.NomeDisciplina AS NomeDisciplina,
d.DisciplinaID AS DisciplinaID,
pes.NomePessoa AS NomePessoa,
pes2.NomePessoa AS NomeAluno,
alu.AlunoID AS AlunoID,
alu.RA AS RAAluno
FROM tb_app_prova AS p, tb_app_turma AS t, tb_app_disciplina_curso AS dc, tb_app_disciplina AS d, tb_app_curso AS cur, tb_core_professor AS pro, tb_core_pessoa AS pes, tb_app_aluno_turma AS altur, tb_app_aluno AS alu, tb_core_pessoa AS pes2 
WHERE p.ProvaID = ".$GabaritoID." AND p.TurmaID = t.TurmaID AND t.DisciplinaCursoID = dc.DisciplinaCursoID AND dc.DisciplinaID = d.DisciplinaID AND dc.CursoID = cur.CursoID 
AND dc.ProfessorID = pro.ProfessorID AND pro.PessoaID = pes.PessoaID AND t.TurmaID = altur.TurmaID AND altur.AlunoID = alu.AlunoID AND alu.PessoaID = pes2.PessoaID")->fetchAll();


include ('Core/vendor/post_qr_code/phpqrcode/qrlib.php');

$html = '<style>
   .alternativas{
        background:#fa0c01;
        color:#fff;
        width: 20px;
        height:20px;
        vertical-align:middle;
        text-align:center;
        font-size:15px;
        border-radius:50%;
        -moz-border-radius:50%;
        -webkit-border-radius:50%;
    }
</style>';

foreach ($proof_info AS $info){

    $qrCodeName = "qrCodes/".$info['Ano'].' - '.$info['NomeDisciplina'].'_'.$info['NomeAluno'].".png";
    $qr = $info['Ano'].' - '.$info['NomeDisciplina'].'_'.$info['NomeAluno'].".png";
    $informacoes = '{ProvaID: '.$info['ProvaID'].', TurmaID: '.$info['TurmaID'].', Curso: '.$info['CursoNome'].', CursoID: '.$info['CursoID'].', Disciplina: '.$info['NomeDisciplina'].', DisciplinaID: '.$info['DisciplinaID'].', Nome Aluno: ' .$info['NomeAluno']. ', AlunoID: ' .$info['AlunoID']. ', Data Prova: ' . $info['DataProva'] . ', Descrição: Prova do periodo da ' . $info['Periodo'] . ' do ano de ' . $info['Ano'] . ' no ' . $info['Semestre'] . '° Semestre}';
    QRcode::png($informacoes, $qrCodeName);

//    echo '<img src="'.APPLICATION_NAME.'/qrCodes/'.$qr.'">';


    $html .= '
    <table style="border: black solid 2px; border-collapse: collapse;">
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td style="width: 20%; padding: 5px; text-align: center;" colspan="4"><img src="' . APPLICATION_NAME . '/assets/img/logocertcomp.png" style=" width: 300px;">
                <p>  </p>
                <b style="font-size: 13px;">Faculdade de Tecnologia de São Bernardo do Campo Adib Moiseis Dib</b></td>
            <td style="width: 3%; text-align: right;" colspan="1"><img src="'.APPLICATION_NAME.'/qrCodes/'.$qr.'" style=" width: 150px;"></td>
        </tr>

        <tr>
            <td style="border: black solid 2px; padding: 5px;" colspan="5"><b>CURSO: ' .$info['CursoNome']. '</b></td>
        </tr>

        <tr>
            <td style="border: black solid 2px; padding: 5px;" colspan="3"><b>DISCIPLINA: ' .$info['NomeDisciplina']. '</b></td>
            <td style="border: black solid 2px; padding: 5px;" colspan="1"><b>CÓDIGO: </b></td>
            <td style="border: black solid 2px; padding: 5px;" colspan="1"><b>SIGLA: </b></td>
        </tr>

        <tr>
            <td style="border: black solid 2px; padding: 5px;" colspan="3"><b>PROFESSOR: ' .$info['NomePessoa']. '</b></td>
            <td style="border: black solid 2px; padding: 5px;" colspan="2"><b>AVALIAÇÃO OFICIAL: ' .$info['ProvaOficial']. '</b></td>
        </tr>

        <tr>
            <td style="border: black solid 2px; padding: 5px;" colspan="1"><b>RA: ' .$info['RAAluno']. '</b></td>
            <td style="border: black solid 2px; padding: 5px;" colspan="3"><b>NOME: ' .$info['NomeAluno']. '</b></td>
            <td style="border: black solid 2px;" colspan="1" rowspan="2"><b>NOTA </b></td>
        </tr>

        <tr>
            <td style="border: black solid 2px; padding: 5px;" colspan="1"><b>TURNO: ' .$info['Periodo']. '</b></td>
            <td style="border: black solid 2px; padding: 5px;" colspan="1"><b>CICLO: ' .$info['Ano']. ' | ' .$info['Semestre']. '° Sem</b></td>
            <td style="border: black solid 2px; padding: 5px;" colspan="1"><b>DATA: ' .$info['DataProva']. '</b></td>
            <td style="border: black solid 2px; padding: 5px; font-size: 10px;" colspan="1"><b>VISTA: </b></td>
        </tr>
    </table>

    <br><br><br><br>

';


    $letter = ['A', 'B', 'C', 'D', 'E'];
    $questoes = json_decode($info['FormatoGabarito']);
    $i = 1;
    $j = 0;

    $html .= '<table style="border: black solid 2px; padding: 45px; margin-left: 20%;">';

    while ($i <= $questoes->Qtd_questoes) {
        if($questoes->Qtd_questoes <= 10) {
            $html .= '<tr><td>' .$i. '</td>';

            while ($j < $questoes->Qtd_alternativas){
                $html .= '<td style="padding: 5px;"><p class="alternativas" style="border: black solid 4px; color: black; background-color: white !important;">' .$letter[$j]. '</p></td>';
                $j++;
            }

            $html .= '</tr>';
        } else {
            $validate = $i + 10;

            if($i <= 10) {
                $html .= '<tr><td>' .$i. '</td>';

                while ($j < $questoes->Qtd_alternativas){
                    $html .= '<td style="padding: 5px;"><p class="alternativas" style="border: black solid 4px; color: black; background-color: white !important;">' .$letter[$j]. '</p></td>';
                    $j++;
                }
            }

            if($validate <= $questoes->Qtd_questoes) {
                $html .= '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>' .$validate. '</td>';
                $j = 0;
                while ($j < $questoes->Qtd_alternativas){
                    $html .= '<td style="padding: 5px;"><p class="alternativas" style="border: black solid 4px; color: black; background-color: white !important;">' .$letter[$j]. '</p></td>';
                    $j++;
                }

            }

            $html .= '</tr>';
        }
        $j = 0;
        $i++;
    }

    if($questoes->Qtd_questoes >= 10) {
        $html .= '</table><br><br><br><br><br><br><br><br>';
    } else if ($questoes->Qtd_questoes >= 9){
        $html .= '</table><br><br><br><br><br><br><br><br><br><br><br>';
    } else if ($questoes->Qtd_questoes >= 8){
        $html .= '</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
    } else if ($questoes->Qtd_questoes >= 7){
        $html .= '</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
    } else if ($questoes->Qtd_questoes >= 6){
        $html .= '</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
    } else if ($questoes->Qtd_questoes >= 5){
        $html .= '</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
    }

}

echo $html;