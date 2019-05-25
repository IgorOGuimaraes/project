<?php

/**
 * Class DashboardModel
 */
class DashboardModel extends Model {

    public function setPasswordValid($pass)
    {

        return $this->connection->query("SELECT ProfessorID FROM  tb_core_professor WHERE UserName = '" . $_SESSION['UserName'] . "' AND Password = '" . $pass . "'")->fetchAll();

    }

    public function setNewPassword($pass, $userID)
    {

        $this->connection->update(
            'tb_core_professor',
            ['Password' => $pass],
            ['ProfessorID' => $userID]
        );

        return $this->connection->id();

    }

    public function getCountCourse($course)
    {
        return $this->connection->query("SELECT count(NomeCurso) AS TCourse FROM tb_app_curso WHERE NomeCurso = '$course'")->fetchAll();
    }

    public function setNewCourse($course)
    {
        $this->connection->insert(
            'tb_app_curso',[
                'NomeCurso' => $course
            ]
        );

        return $this->connection->id();
    }

    public function getCountDisciplina($disciplina)
    {
        return $this->connection->query("SELECT count(NomeDisciplina) AS TDisciplina FROM tb_app_disciplina WHERE NomeDisciplina = '$disciplina'")->fetchAll();
    }

    public function setNewDisciplina($course)
    {
        $this->connection->insert(
            'tb_app_disciplina',[
                'NomeDisciplina' => $course
            ]
        );

        return $this->connection->id();
    }

    public function getCountNomeTeacher($name)
    {
        return $this->connection->query("SELECT 
          count(pe.NomePessoa) AS nome
          FROM tb_core_pessoa AS pe, tb_core_professor AS pr
          WHERE pe.NomePessoa = '$name' AND pr.PessoaID = pe.PessoaID")->fetchAll();
    }

    public function getCountMailTeacher($email)
    {
        return $this->connection->query("SELECT 
          count(pr.Email) AS mail
          FROM tb_core_professor AS pr 
          WHERE pr.Email = '$email'")->fetchAll();
    }

    public function getCountUserTeacher($user)
    {
        return $this->connection->query("SELECT 
          count(pr.UserName) AS uname
          FROM tb_core_professor AS pr 
          WHERE pr.UserName = '$user'")->fetchAll();
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

    public function setNewTeacher($id_pessoa, $user_name, $pass, $teacher_email)
    {
        return $this->connection->insert(
            'tb_core_professor', [
                'PessoaID' => $id_pessoa,
                'UserName' => $user_name,
                'Password' => $pass,
                'Email' => $teacher_email
            ]
        );
    }


    public function getProfessores()
    {

        return $this->connection->query("SELECT 
                pessoa.NomePessoa AS 'Nome',
                professor.ProfessorID AS 'ProfessorID',
                professor.UserName AS 'Login',
                professor.Email AS 'Mail'
                FROM tb_core_pessoa AS pessoa, tb_core_professor AS professor 
                WHERE pessoa.PessoaID = professor.PessoaID")->fetchAll();

    }

    public function getNomeAlunos()
    {

        return $this->connection->query("SELECT * FROM tb_core_pessoa AS pessoa, tb_app_aluno AS aluno 
                WHERE pessoa.PessoaID = aluno.PessoaID AND aluno.ProfessorID = {$_SESSION['ProfessorID']}")->fetchAll();

    }

    public function getDisciplinas()
    {
        return $this->connection->select('tb_app_disciplina', '*');
    }

    public function getCursos()
    {
        return $this->connection->select('tb_app_curso', '*');
    }

    public function getNotasAluno($aluno_id, $disciplina_id)
    {
        return $this->connection->query("SELECT
                pessoa.NomePessoa AS Nome,
                prova.ProvaOficial AS Prova,
                respostas.NotaAluno AS Nota
                
                FROM tb_core_pessoa AS pessoa, tb_app_aluno AS aluno, tb_app_respostas AS respostas, 
                tb_app_prova AS prova, tb_app_turma AS turma, tb_app_disciplina_curso AS disciplinaCurso
                
                WHERE pessoa.PessoaID = aluno.PessoaID AND aluno.AlunoID = $aluno_id AND aluno.AlunoID = respostas.AlunoID
                AND respostas.ProvaID = prova.ProvaID AND prova.TurmaID = turma.TurmaID
                AND turma.DisciplinaCursoID = disciplinaCurso.DisciplinaCursoID AND disciplinaCurso.DisciplinaID = $disciplina_id ORDER BY prova.ProvaOficial ASC")->fetchAll();
    }

    public function mediaNotasTurma($disciplina_id, $curso_id, $perido, $oficial, $ano, $semestre)
    {

        return $this->connection->query("SELECT
                AVG(respostas.NotaAluno) AS MediaNota
                FROM tb_app_disciplina_curso AS disciplinaCurso, tb_app_turma AS turma, tb_app_prova AS prova, tb_app_respostas AS respostas
                WHERE disciplinaCurso.CursoID = $curso_id AND disciplinaCurso.DisciplinaID = $disciplina_id
                AND disciplinaCurso.DisciplinaCursoID = turma.DisciplinaCursoID
                AND turma.Periodo = '$perido' AND turma.Ano = $ano AND turma.Semestre = $semestre
                AND turma.TurmaID = prova.TurmaID AND prova.ProvaOficial = '$oficial'
                AND prova.ProvaID = respostas.ProvaID")->fetchAll();

    }

    public function getRespostas($disciplina_id, $curso_id, $periodo, $oficial, $ano, $semestre)
    {

        return $this->connection->query("SELECT
                respostas.RespostaAluno AS Respostas
                FROM tb_app_turma AS turma, tb_app_disciplina_curso AS disciplinaCurso, tb_app_prova AS prova, tb_app_respostas AS respostas
                WHERE turma.Periodo = '$periodo' AND turma.Ano = $ano AND turma.Semestre = $semestre
                AND turma.DisciplinaCursoID = disciplinaCurso.DisciplinaCursoID
                AND disciplinaCurso.CursoID = $curso_id AND disciplinaCurso.DisciplinaID = $disciplina_id AND disciplinaCurso.ProfessorID = {$_SESSION['ProfessorID']}
                AND turma.TurmaID = prova.TurmaID AND prova.ProvaID = respostas.ProvaID AND prova.ProvaOficial = '$oficial'")->fetchAll();

    }

}