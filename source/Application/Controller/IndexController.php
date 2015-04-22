<?php namespace Application\Controller;

use Framework\Controller;
use Framework\Library as Lib;

class IndexController extends Controller {

    function __construct(){
        parent::__construct();
    }

    function index(){
        $data = array(
            'name' => 'Username'
        );

        $this->view->load('index.php', $data);
    }

    function lol(){

    }
}