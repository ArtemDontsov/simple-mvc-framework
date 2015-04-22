<?php namespace Framework\Exception\Route;

use \Exception;

class BadControllerException extends Exception {
    public function __construct($controller) {
        parent::__construct("Controller $controller does not match base controller");
    }
}
