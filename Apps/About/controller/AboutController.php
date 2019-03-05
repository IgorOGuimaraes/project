<?php
/**
 * @author Igor de Oliveira Guimarães
 * @version 1.0.0
 * @description This controller is use on login interaction for the core
 */

class AboutController extends Controller
{

    /**
     * This is default method on the app
     * @author Igor de Oliveira Guimarães
     */
    public function home()
    {
        //Set empty html view
        $this->contentType('clean');
        //Add login view
        include 'Apps/About/view/guide.php';
    }

    public function about()
    {
        //Set empty html view
        $this->contentType('clean');
        //Add login view
        include 'Apps/About/view/about.php';
    }

}