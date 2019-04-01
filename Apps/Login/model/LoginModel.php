<?php

/**
 * This model handles the Controller operation for login
 * @author Igor de Oliveira Guimarães
 * @version 1.0.0
 */
class LoginModel extends Model {

    public function getValidateUser($user)
    {

        return $this->connection->query("SELECT * FROM tb_core_professor WHERE UserName = '" . $user['user-name'] . "' AND Password = '" . md5($user['pass-user']) . "'")->fetchAll();

    }

    public function getUserInfo($PessoaID)
    {

        return $this->connection->query("SELECT * FROM tb_core_pessoa WHERE PessoaID = " . $PessoaID)->fetchAll();

    }

    public function getEmailTeacher($mail)
    {
        return $this->connection->query("SELECT pe.NomePessoa, pr.UserName FROM tb_core_professor AS pr, tb_core_pessoa AS pe 
          WHERE pe.PessoaID = pr.PessoaID AND pr.Email = '$mail'")->fetchAll();
    }

    public function setNewPasswor($mail, $pass)
    {
        return $this->connection->update(
            'tb_core_professor',[
                'Password' => $pass
            ], [
                'Email' => $mail
            ]
        );
    }

}

