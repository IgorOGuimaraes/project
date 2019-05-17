<?php

class ManagementResultsModel extends Model
{

    public function getNotas($info)
    {
        return $this->connection->query("SELECT
                pessoa.NomePessoa AS NomeAluno,
                aluno.RA AS RAAluno,
                turma.Ano AS AnoTurma,
                turma.Semestre AS SemestreTurma,
                turma.Periodo AS PeriodoTurma,
                disciplina.NomeDisciplina AS NomeDisciplina,
                prova.ProvaOficial AS Prova,
                respostas.NotaAluno AS NotaAluno
                
                FROM
                tb_core_pessoa AS pessoa,
                tb_app_aluno AS aluno,
                tb_app_aluno_turma AS alunoTurma,
                tb_app_turma AS turma,
                tb_app_disciplina_curso AS disciplinaCurso,
                tb_app_disciplina AS disciplina,
                tb_app_prova AS prova,
                tb_app_respostas AS respostas
                
                WHERE pessoa.PessoaID = aluno.PessoaID AND aluno.ProfessorID = {$_SESSION['ProfessorID']}
                AND aluno.AlunoID = alunoTurma.AlunoID AND alunoTurma.TurmaID = turma.TurmaID
                AND (turma.Periodo = '{$info['periodo-add-export']}' AND turma.Ano = {$info['ano-export']} AND turma.Semestre = {$info['semestre-export']})
                AND turma.DisciplinaCursoID = disciplinaCurso.DisciplinaCursoID
                AND (disciplinaCurso.CursoID = {$info['nome_curso_export']} AND disciplinaCurso.DisciplinaID = {$info['disciplina-export']})
                AND disciplinaCurso.DisciplinaID = disciplina.DisciplinaID
                AND prova.TurmaID = turma.TurmaID AND prova.ProvaID = respostas.ProvaID AND respostas.AlunoID = aluno.AlunoID")->fetchAll();
    }

    public function getDisciplina()
    {
        return $this->connection->query("SELECT * FROM tb_app_disciplina")->fetchAll();
    }

    public function getCurso()
    {
        return $this->connection->query("SELECT * FROM tb_app_curso")->fetchAll();
    }

}