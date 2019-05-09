<?php
/**
 * Created by PhpStorm.
 * User: fz388
 * Date: 03/03/2019
 * Time: 20:29
 */

class ManagementStudentModel extends Model
{

    public function getAlunos()
    {
        return $this->connection->query("SELECT * FROM tb_app_aluno AS aluno, tb_core_pessoa AS pessoa WHERE aluno.PessoaID = pessoa.PessoaID AND aluno.ProfessorID = " . $_SESSION['ProfessorID'])->fetchAll();
    }

    public function setNewPessoa($name)
    {
        $this->connection->insert(
            'tb_core_pessoa' ,[
                'NomePessoa' => $name
            ]
        );
        return $this->connection->id();
    }

    public function setNewAluno($id_pessoa, $ra)
    {
        $this->connection->insert(
            'tb_app_aluno', [
                'PessoaID' => $id_pessoa,
                'RA' => $ra,
                'ProfessorID' => $_SESSION['ProfessorID']
            ]
        );

        return $this->connection->id();
    }

    public function getAluno($alunoID)
    {
        return $this->connection->query("SELECT * FROM tb_app_aluno AS aluno, tb_core_pessoa AS pessoa WHERE aluno.PessoaID = pessoa.PessoaID AND aluno.AlunoID = $alunoID")->fetchAll();
    }

    public function deleteAluno($idAluno)
    {
        return $this->connection->delete('tb_app_aluno', ['AlunoId' => $idAluno]);
    }

    public function deletePessoa($idPessoa)
    {
        return $this->connection->delete('tb_core_pessoa', ['PessoaID' => $idPessoa]);
    }

    public function getDisciplinaCurso($disciplina_id)
    {
        return $this->connection->query("SELECT * FROM tb_app_disciplina_curso AS dc, tb_app_disciplina AS d, tb_app_curso AS c WHERE dc.CursoID = c.CursoID AND dc.DisciplinaID = d.DisciplinaID AND d.DisciplinaID = " . $disciplina_id)->fetchAll();
    }

    public function getTurma($disciplinaCursoID, $periodo, $year, $semester)
    {
        return $this->connection->select("tb_app_turma", ['TurmaID'], [
            'AND' => [
                'DisciplinaCursoID' => $disciplinaCursoID,
                'Periodo' => $periodo,
                'Ano' => $year,
                'Semestre' => $semester
            ]
        ]);
    }

    public function getCursoDisciplina($disciplina, $curso)
    {
        return $this->connection->select('tb_app_disciplina_curso', ['DisciplinaCursoID'],
            [
                'AND' => [
                    'CursoID' => $curso,
                    'DisciplinaID' => $disciplina
                ]
            ]
        );
    }

    public function setNewTurma($alunoID, $turmaID)
    {
        $this->connection->insert(
            'tb_app_aluno_turma', [
                'AlunoID' => $alunoID,
                'TurmaID' => $turmaID
            ]
        );

        return $this->connection->id();
    }

    public function deleteTurma($idTurma, $idAluno)
    {
        return $this->connection->delete('tb_app_aluno_turma', ['TurmaID' => $idTurma, 'AlunoID' => $idAluno]);
    }

    public function getDisciplina()
    {
        return $this->connection->query("SELECT * FROM tb_app_disciplina")->fetchAll();
    }

    public function getCurso()
    {
        return $this->connection->query("SELECT * FROM tb_app_curso")->fetchAll();
    }

    public function getDisciplinas($id_aluno)
    {
        return $this->connection->query("SELECT * FROM tb_app_aluno_turma AS alutur, tb_app_turma AS tur, tb_app_disciplina_curso AS dc,
                tb_app_disciplina AS d, tb_app_curso AS c 
                WHERE dc.DisciplinaID = d.DisciplinaID AND dc.CursoID = c.CursoID AND dc.DisciplinaCursoID = tur.DisciplinaCursoID
                AND tur.TurmaID = alutur.TurmaID AND alutur.AlunoID = " . $id_aluno)->fetchAll();
    }

    public function getNotas($id_aluno, $turmaID)
    {
        return $this->connection->query("SELECT * FROM tb_app_respostas AS resp, tb_app_prova AS prov, tb_app_turma AS tur WHERE 
                resp.ProvaID = prov.ProvaID AND prov.TurmaID = tur.TurmaID AND resp.AlunoID = {$id_aluno} AND prov.TurmaID = {$turmaID}")->fetchAll();
    }

    public function getNotasExport($info)
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
}