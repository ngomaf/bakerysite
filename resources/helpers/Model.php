<?php

namespace Resources\helpers;

use Exception;
use Resources\helpers\DataBase;

/**
 * <b>Model</b>
 * This class is mother of all model, it is to import essencials configurations to connect database
 * 
 * copyright (c) 2024, ngoma m. fortuna of the mostarda tec
 */

class Model
{
    public DataBase $db;
     
    public function __construct() {

        $this->db = new DataBase();

    }

    protected function modelError(Exception $error): array {
        return ['error_code'=>$error->getCode(), 
            'error_message'=>$error->getMessage(),
            'error_arquive'=>$error->getFile(),
            'error_line'=>$error->getLine(),
        ];	
    }
}