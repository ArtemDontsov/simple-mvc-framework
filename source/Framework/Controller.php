<?php namespace Framework;

use Framework\Library\Input;

abstract class Controller {

    public  $view;
    public  $input;
    private $library = array();

    function __construct(){
        $this->view  = new View();
        $this->input = Input::getInstance();
        $this->init_library();

    }

    private function init_library(){
        foreach(Autoload::$library as $key => $value)
        {
            $this->$key = $value;
        }
    }

    public function load_library($name, $library){
        $this->$name = $library;
    }

}