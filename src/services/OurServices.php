<?php

namespace App\services;

class OurServices
{
    public function get():array
    {
        return $this->getDatas();
    }
    
    public function find(int $key):array
    {
        return $this->getDatas()[$key - 1];
    }

    private function getDatas():array {
        require PATH . '/test/datas/services.php';
        return $datas;
    }
}