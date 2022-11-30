<?php

require_once __DIR__ . '/../vendor/autoload.php';

//$router = new \Learning\Core\Services\Routing\Router();
$router = new \Learning\App\Services\MyRouting\MyRouter('Learning\\App\\Controllers');

$application = new \Learning\Core\Application($router);

$application->main();

