<?php

include_once realpath(__DIR__.'/../').'/vendor/autoload.php';

$app = Framework\Application::getInstance();
$app->run();