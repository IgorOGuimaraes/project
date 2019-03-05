<?php

/**
 * Class DashboardModel
 */
class DashboardModel extends Model {

    public function setPasswordValid($pass)
    {

        return $this->connection->query("SELECT UserID FROM  tb_core_users WHERE UserName = '" . $_SESSION['UserName'] . "' AND Password = '" . $pass . "'")->fetchAll();

    }

    public function setNewPassword($pass, $userID)
    {

        $this->connection->update(
            'tb_core_users',
            ['Password' => $pass],
            ['UserID' => $userID]
        );

        return $this->connection->id();

    }

}