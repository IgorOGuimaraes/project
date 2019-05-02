<?php
/**
 * @Author Igor de Oliveira Guimarães
 * @copyright 2018
 * @revision Igor de Oliveira Guimarães
 * @version 1.0.a
 **/

//Add Settings file for system configuration
require_once("Core/settings.config.php");

//Add the core router for the URI calls
require_once("Core/router.core.php");

//Break URI slash to array
$url_to_array = explode("/", $_SERVER['REQUEST_URI']);

//Init session manager
session_start();

//Add Core controller
require_once("Core/controller/Controller.core.php");

//change the requested URI to router patern
$call_c = strtoupper($url_to_array[2]);

//Call the required
if (isset($core_routes[$call_c])) {

    //Add the required Model
    require_once $core_routes[$call_c]['Model'];

    //Add the required controller
    require_once $core_routes[$call_c]['Controller'];

    $controller_error = null;
    try {

        //Start the controller
        $controller = new $core_routes[$call_c]['Name']($core_routes);

    } catch (Exception $controller_error_l) {

        $controller_error = $controller_error_l;
        header('Location: ' . APPLICATION_NAME . '/login/internal_error');

    }

    if (method_exists($controller, @$url_to_array[3])) {

        //call the required method
        $controller->{$url_to_array[3]}();

        $model_name = str_replace('Controller', 'Model', $core_routes[$call_c]['Name']);

        try {

            $current_model = new $model_name();

        } catch (Exception $e) {

            header('Location: ' . APPLICATION_NAME . '/login/internal_error');
            die;

        }


        if (method_exists($current_model, $url_to_array[3])) {
            header('Location: ' . APPLICATION_NAME . '/login/home/?redir=' . $_SERVER['REQUEST_URI']);
            die;
        }

        //finish the controller
//        $controller->__destruct();

    } else {

        header('Location: ' . APPLICATION_NAME . '/login/not_found');
        die;
    }

} else {

    header('Location: ' . APPLICATION_NAME . '/login/home');
    die;

}