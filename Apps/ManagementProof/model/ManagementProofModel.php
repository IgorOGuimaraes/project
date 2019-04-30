<?php

class ManagementProofModel extends Model
{
    public function loadProofDatatable($ProfessorID)
    {
        return $this->connection->query("SELECT
                p.ProvaID,
                p.VersaoProva,
                p.DataProva,
                p.ProvaOficial,
                t.Periodo,
                t.Ano,
                t.Semestre
                FROM tb_app_prova AS p, tb_app_turma AS t, tb_app_disciplina_curso AS dc
                WHERE p.TurmaID = t.TurmaID AND t.DisciplinaCursoID = dc.DisciplinaCursoID AND dc.ProfessorID = " . $ProfessorID)->fetchAll();
    }

    public function getDisciplina()
    {
        return $this->connection->select('tb_app_disciplina', '*');
    }

    public function getCurso()
    {
        return $this->connection->select('tb_app_curso', '*');
    }

    public function getTurma($periodoProof, $anoProof, $semestreProof, $disciplinaProof, $cursoProof, $ProfessorID)
    {

        return $this->connection->query("SELECT t.TurmaID FROM tb_app_turma AS t, tb_app_disciplina_curso AS dc WHERE t.Periodo = '" . $periodoProof . "' AND t.Ano = " . $anoProof . " AND t.Semestre = " . $semestreProof . " AND dc.CursoID = " . $cursoProof . " AND dc.DisciplinaID = " . $disciplinaProof . " AND dc.ProfessorID = " . $ProfessorID . " AND t.DisciplinaCursoID = dc.DisciplinaCursoID")->fetchAll();

    }

    public function getCountProva($turmaInfo)
    {
        return $this->connection->query("SELECT count(ProvaID) AS CountProof FROM tb_app_prova WHERE TurmaID = " . $turmaInfo)->fetchAll();
    }

    public function setNewProof($turmaID, $dataProva, $respostaCorreta, $versaoProva, $officialProof, $formatoGabarito)
    {
        return $this->connection->insert('tb_app_prova', [
            'TurmaID' => $turmaID,
            'DataProva' => $dataProva,
            'RespostasCorretas' => $respostaCorreta,
            'VersaoProva' => $versaoProva,
            'ProvaOficial' => $officialProof,
            'FormatoGabarito' => $formatoGabarito
        ]);
    }

    public function deleteProof($ProvaID)
    {
        return $this->connection->delete('tb_app_prova', ['ProvaID' => $ProvaID]);
    }

    public function getProva($GabaritoID)
    {
        return $this->connection->query('SELECT 
                p.FormatoGabarito AS FormatoGabarito,
                p.DataProva AS DataProva,
                p.VersaoProva AS VersaoProva,
                p.ProvaOficial AS ProvaOficial,
                t.Periodo AS Periodo,
                t.Ano AS Ano,
                t.Semestre AS Semestre,
                cur.NomeCurso AS CursoNome,
                d.NomeDisciplina AS NomeDisciplina,
                pes.NomePessoa AS NomePessoa
                FROM tb_app_prova AS p, tb_app_turma AS t, tb_app_disciplina_curso AS dc, tb_app_disciplina AS d, tb_app_curso AS cur, tb_core_professor AS pro, tb_core_pessoa AS pes 
                WHERE p.ProvaID = '.$GabaritoID.' AND p.TurmaID = t.TurmaID AND t.DisciplinaCursoID = dc.DisciplinaCursoID AND dc.DisciplinaID = d.DisciplinaID AND dc.CursoID = cur.CursoID AND dc.ProfessorID = pro.ProfessorID AND pro.PessoaID = pes.PessoaID')->fetchAll();
    }

}