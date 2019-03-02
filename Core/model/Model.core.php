<?php


require_once 'Core/vendor/Medoo.class.php';

/**
 * Class Model
 */
class Model
{

    /**
     * @var bool
     */
    public $connection;
    /**
     * @var array
     */
    public $_log = [];

    /**
     * Model constructor.
     */
    public function __construct()
    {

        try {

            $this->connection = new Medoo([

                'database_type' => DB_TYPE,
                'database_name' => DB_NAME,
                'server' => DB_HOST,
                'username' => DB_USER,
                'password' => DB_PASSWORD,
                'charset' => CHARSET,
                'port' => DB_PORT,
            ]);

        } catch (Exception $e) {

            $this->_log[date('Y-m-d H:i:s')] = $e;
            $this->connection = false;

        }


    }

    /**
     *
     */
    public function __destruct()
    {
        // TODO: Implement __destruct() method.

    }

}
