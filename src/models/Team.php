<?php

namespace App\models;

use Resources\helpers\Model;
use Resources\helpers\DataBase;
use Exception;

/**
 * Model Team
 * Lista membros da equipe a partir da tabela `team` (se existir).
 */
class Team extends Model
{
    protected string $table = 'team';

    protected function prepare(string $sql)
    {
        if (isset($this->db) && is_object($this->db) && method_exists($this->db, 'prepare')) {
            return $this->db->prepare($sql);
        }
        return DataBase::prepare($sql);
    }

    /**
     * Retorna todos os membros da equipe
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
