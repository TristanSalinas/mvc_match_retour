<?php
require './config/autoload.php';

$router = new Router();
$router->routing($_GET);
