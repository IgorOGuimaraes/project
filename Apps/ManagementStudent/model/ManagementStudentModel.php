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
        return $this->connection->query("SELECT * FROM tb_app_aluno AS aluno, tb_core_pessoa AS pessoa WHERE aluno.PessoaID = pessoa.PessoaID")->fetchAll();
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
                'RA' => $ra
            ]
        );

        return $this->connection->id();
    }

    public function getAluno($alunoID)
    {
        return $this->connection->query("SELECT * FROM tb_app_aluno AS aluno, tb_core_pessoa AS pessoa WHERE aluno.PessoaID = pessoa.PessoaID AND aluno.AlunoID = $alunoID")->fetchAll();
    }

}