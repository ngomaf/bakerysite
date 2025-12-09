<?php

namespace App\models;

use Resources\helpers\Model;
use Resources\helpers\DataBase;
use Exception;

/**
 * Model About
 * Recupera e atualiza os dados da tabela `about`.
 */
class About extends Model
{
    protected string $table = 'about';

    protected function prepare(string $sql)
    {
        if (isset($this->db) && is_object($this->db) && method_exists($this->db, 'prepare')) {
            return $this->db->prepare($sql);
        }
        return DataBase::prepare($sql);
    }

    /**
     * Retorna o primeiro registro de about (informações da empresa)
     * @return array|object
     */
    public function get(): array|object
    {
        try {
            $sql = "SELECT * FROM {$this->table} LIMIT 1";
            $stmt = $this->prepare($sql);
            $stmt->execute();
            return $stmt->fetch() ?: [];
        } catch (Exception $e) {
            return $this->modelError($e);
        }
    }

    /**
     * Atualiza o registro de about
     * @param int $id
     * @param array $data
     * @return bool|array
     */
    public function update(int $id, array $data): bool|array
    {
        try {
            $sql = "UPDATE {$this->table} SET company_name = :company_name, slogan = :slogan, description = :description, phone = :phone, email = :email, address = :address, mission = :mission, vision = :vision, updated_at = CURRENT_TIMESTAMP WHERE id = :id";
            $stmt = $this->prepare($sql);
            return $stmt->execute([
                ':id' => $id,
                ':company_name' => $data['company_name'] ?? null,
                ':slogan' => $data['slogan'] ?? null,
                ':description' => $data['description'] ?? null,
                ':phone' => $data['phone'] ?? null,
                ':email' => $data['email'] ?? null,
                ':address' => $data['address'] ?? null,
                ':mission' => $data['mission'] ?? null,
                ':vision' => $data['vision'] ?? null,
            ]);
        } catch (Exception $e) {
            return $this->modelError($e);
        }
    }
}
