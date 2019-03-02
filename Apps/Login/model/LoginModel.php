<?php

/**
 * This model handles the Controller operation for login
 * @author Igor de Oliveira Guimarães
 * @version 1.0.0
 */
class LoginModel extends Model {

    public function getValidateUser($user)
    {

        return $this->connection->query("SELECT * FROM tb_core_users WHERE UserName = '" . $user['user-name'] . "' AND Password = '" . $user['pass-user'] . "'")->fetchAll();

    }

}

