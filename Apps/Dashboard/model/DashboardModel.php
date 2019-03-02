<?php

/**
 * Class DashboardModel
 */
class DashboardModel extends Model {

    /**
     * @param $username
     * @return mixed
     */
    public function getUser($username)
    {

        $this->_log['getUser'] = $this->connection->error();

        return $this->connection->select('tb_core_users','*',['UserLogin'=>$username]);
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getUsersWidgets($user_id)
    {
        $this->_log['getUsersWidgets'] = $this->connection->error();
        return $this->connection->select('tb_core_user_apps','*',['UserLogin'=>$user_id]);
    }

    /**
     * @param $userid
     * @param $dashboard
     */
    public function dashboardSave($userid, $dashboard)
    {
        //TODO:Create logic to save grid on tb_core_dashboard
    }

    /**
     * @param $userid
     * @return mixed
     */
    public function userApps($userid)
    {

        $this->_log['userApps'] = $this->connection->error();
        return $this->connection->select('tb_core_apps','*',['UserID'=>$userid]);

    }

    /**
     * @param $userid
     * @param $appid
     * @return mixed
     */
    public function userAppsInstalled($userid, $appid)
    {

        $this->_log['userAppsInstalled'] = $this->connection->error();
        return $this->connection->select(
            'tb_core_user_apps',
            '*',
            [
                "AND"=>[
                    'UserID'=>$userid,
                    'AppID'=>$appid
                ]
            ]
        );

    }

    /**
     * @param $userid
     * @param $appid
     * @return mixed
     */
    public function userAppsInstalledRand($userid, $appid)
    {

        return $this->connection->query("SELECT * FROM tb_core_user_apps WHERE UserID = $userid AND AppID = $appid ORDER BY RAND();")->fetchAll();


    }

    /**
     * @param $userid
     * @param $json_data
     * @param $html_data
     */
    public function saveDashboard($userid, $json_data, $html_data)
    {

        $user_data = $this->connection->select('tb_core_dashboard','*');

    }


    /**
     * @param $DlName
     * @param $UserName
     * @return mixed
     */
    public function setUserAd($DlName, $UserName)
    {
        return $this->connection->insert(
            'tb_core_ad_dls',
            [
                'DlName'=>$DlName,
                'UserName'=>$UserName
            ]
        );
    }

    /**
     * @param $UserID
     * @return mixed
     */
    public function returnSearch($UserID)
    {

        return $this->connection->query("SELECT * FROM tb_core_user_apps INNER JOIN tb_core_apps  ON tb_core_apps.AppID = tb_core_user_apps.AppID WHERE UserID = $UserID;")->fetchAll();

    }


    /**
     * @param $AppID
     * @return mixed
     */
    public function getUserPermissionByApp($AppID){


        return $this->connection->query("SELECT * FROM tb_core_users INNER JOIN tb_core_apps_allow ON tb_core_users.UserID = tb_core_apps_allow.UserID INNER JOIN tb_core_apps ON tb_core_apps_allow.AppID = tb_core_apps.AppID WHERE tb_core_apps.AppID = $AppID;")->fetchAll();

    }

}

