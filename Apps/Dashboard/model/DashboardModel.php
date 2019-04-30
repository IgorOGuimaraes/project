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



}