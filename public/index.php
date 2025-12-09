<?php

error_reporting(E_ALL);
ini_set("display_errors", 1); // 1

use Ngomafortuna\RouteSystemSimple\Route;

define("PATH", dirname(__FILE__, 2));

require_once PATH . "/config.php";
require_once PATH . '/vendor/autoload.php';

(new Route)->index();