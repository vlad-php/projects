<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT', dirname('_FILE_'));
require_once(ROOT.'/components/Router.php');

$router = new Router();
$router->run();