<?php

define("URL", $_SERVER['HTTP_HOST']);
define("VIEWS", PATH . '/resources/views');
define("MAINDIR", PATH . '/src');
define("MAINAME", 'App');

define("DB_CONF", [
    "DB_HOST" => "localhost",
    "DB_PORT" => "3306",
    "DB_NAME" => "databse_name",
    "DB_USER" => "username",
    "DB_PASSWORD" => "password",
    "DB_CHARSET" => "utf8"
]);