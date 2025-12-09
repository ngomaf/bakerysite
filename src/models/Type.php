<?php

namespace App\models;

use Resources\helpers\Model;
use Resources\helpers\DataBase;
use Exception;

/**
 * Model Type
 * CRUD básico para a tabela `types` (listar todos os tipos de pão).
 */
class Type extends Model
{
    protected string $table = 'types';

    protected function prepare(string $sql)
    {
        if (isset($this->db) && is_object($this->db) && method_exists($this->db, 'prepare')) {
            return $this->db->prepare($sql);
        }
        return DataBase::prepare($sql);
    }

    /**
     * Lista todos os tipos de pão
     * @return array
     */
    public function all(): array
    {
        try {
            $sql = "SELECT * FROM {$this->table} ORDER BY id ASC";
            $stmt = $this->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $this->modelError($e);
        }
    }
}