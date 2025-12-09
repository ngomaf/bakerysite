<?php

if (!function_exists('listar_tipos_pao')) {
    function listar_tipos_pao() {
        static $tipos = null;
        if ($tipos !== null) return $tipos;
        try {
            $typeModel = new \App\models\Type();
            $tipos = $typeModel->all();
        } catch (\Throwable $e) {
            $tipos = [];
        }
        return $tipos;
    }
}
