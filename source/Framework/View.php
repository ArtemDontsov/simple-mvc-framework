<?php namespace Framework;

final class View{

    private $path;

    function __construct(){
        $this->path = realpath(__DIR__.'/../').'/Application/View/';
    }

    private function __clone(){}

    public function load($view, $data = null){
        if(!empty($data))
            extract($data);
        //lol
        include_once $this->path.$view;
    }

}
