<?php

    namespace Resources\helpers;

    use Exception, PDO;

    class DataBase  {
        private static $instance;

        public static function getInstance() {
            if(!isset(self::$instance)) {
                try {
                    self::$instance = new PDO("mysql:host=" . DB_CONF['DB_HOST'] . ";port=" . DB_CONF['DB_PORT'] . ";dbname=" . DB_CONF['DB_NAME'], DB_CONF['DB_USER'], DB_CONF['DB_PASSWORD']);
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                    self::$instance->exec("SET CHARACTER SET " . DB_CONF['DB_CHARSET']);
                } catch (Exception $erros) {
                    die("
                        Codigo do erro: # {$erros->getCode()}<br>
                        Mensagem: # {$erros->getMessage()}<br>
                        Arquivo: # {$erros->getFile()}<br>   
                        Linha do erro: # {$erros->getLine()}<br>   
                    ");
                }
            }

            return self::$instance;

        }

        public static function prepare($sql) {
            return self::getInstance()->prepare($sql);
        }

    }
