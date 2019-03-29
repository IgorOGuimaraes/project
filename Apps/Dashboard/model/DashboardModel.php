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

}