<?php
include_once("Core/model/Model.core.php");

//This interface allows

/**
 * Interface IAppCore
 */
interface IAppCore
{

    /**
     * @return mixed
     */
    public function home();

}

/**
 * Class Controller
 */
abstract class Controller implements IAppCore
{

    /**
     * @var Model
     */
    public $model;

    /**
     * @var
     */
    public $content_type;

    /**
     * @var
     */
    public $_ROUTER;

    /**
     * @var
     */
    public $_SCRIPTS;

    /**
     * @var
     */
    public $_STYLE;

    /**
     * Controller constructor.
     */
    public final function __construct($routs)
    {
        $this->model = new Model();
        $this->_ROUTER = $routs;

    }

    /**
     * @param string $type
     */
    protected function contentType($type, $page_name = '', $scripts = [], $style = [], $filename = '')
    {

        switch ($type) {
            case 'html':
                header('Content-type: text/html; charset=UTF-8');
                $this->content_type = 'html';
                break;
            case 'clean':
                header('Content-type: text/html; charset=UTF-8');
                $this->content_type = 'clean';
                break;
            case 'json':
                header('Content-Type: application/json');
                $this->content_type = 'json';
                break;
            case 'text':
                header("Content-Type: text/plain");
                break;
            case 'download':

                $url_encode = urldecode($filename);

                $filesa = iconv('utf-8', 'cp1252', $url_encode);

                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($filename));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filename));
                ob_clean();
                flush();
                readfile($filename);
                break;
            case 'ajax':

                header('Content-Type: application/json');
                $this->content_type = 'json';

                define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
                if (!IS_AJAX) {

                    header('Location: /' . APPLICATION_NAME . '/login/home/?redir=' . $_SERVER['REQUEST_URI']);
                    die;
                };
                break;
            case 'xml':
                header('content-type: text/xml');
                break;
            default:
                header("Content-Type: text/plain");
                break;
        }


        if ($type == 'html') {

            $this->_STYLE = $style;
            $this->_SCRIPTS = $scripts;
            $page_name = $page_name;
            $routes = $this->_ROUTER;

            include '\wamp\www\project\Core\view\header.core.php';
        }


    }

    /**
     * @param array $script_array_path
     * @return array
     */
    public function addScript($script_array_path = [])
    {
        return $this->_SCRIPTS = $script_array_path;
    }


    /**
     * @param bool $access
     */
    protected function privateAccess($access = true)
    {

        if ($access == true) {

            if (empty($_SESSION['UserID'])) {

                header('Location:  /' . APPLICATION_NAME . '/login/home/?redir=' . $_SERVER['REQUEST_URI']);
                die;
            }

        }

    }

    /**
     *
     */
    public final function __destruct()
    {

        if ($this->content_type == 'html') {
            $scripts = $this->_SCRIPTS;
            include '\wamp\www\project\Core\view\footer.core.php';
        }

    }

}
