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

}