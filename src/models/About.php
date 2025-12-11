<?php

namespace App\models;

use Resources\helpers\Model;
use Resources\helpers\DataBase;
use Exception;

/**
 * Model About
 * CRUD completo para a tabela `about` com informações da empresa.
 */
class About extends Model
{
    protected string $table = 'about';

    /**
     * Helper para preparar statements de forma compatível com a implementação atual de DataBase.
     */
    protected function prepare(string $sql)
    {
        // Preferir usar método de instância se disponível
        if (isset($this->db) && is_object($this->db) && method_exists($this->db, 'prepare')) {
            return $this->db->prepare($sql);
        }

        // Caso contrário, usar o helper estático
        return DataBase::prepare($sql);
    }

    // CREATE
    /**
     * Cria um novo registro de about
     * @param array $data
     * @return bool|array
     */
    public function create(array $data): bool|array
    {
        try {
            $sql = "INSERT INTO {$this->table} (company_name, slogan, description, phone, email, address, mission, vision) VALUES (:company_name, :slogan, :description, :phone, :email, :address, :mission, :vision)";
            $stmt = $this->prepare($sql);
            return $stmt->execute([
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

    // READ all
    /**
     * Retorna todos os registros de about
     * @return array
     */
    public function all(): array
    {
        try {
            $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
            $stmt = $this->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $this->modelError($e);
        }
    }

    // READ by id
    /**
     * Retorna um registro de about pelo ID
     * @param int $id
     * @return array|object
     */
    public function find(int $id): array|object
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
            $stmt = $this->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch() ?: [];
        } catch (Exception $e) {
            return $this->modelError($e);
        }
    }

    // READ - primeiro registro (método legado)
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

    // UPDATE
    /**
     * Atualiza um registro de about
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

    // DELETE
    /**
     * Deleta um registro de about
     * @param int $id
     * @return bool|array
     */
    public function delete(int $id): bool|array
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->prepare($sql);
            return $stmt->execute([':id' => $id]);
        } catch (Exception $e) {
            return $this->modelError($e);
        }
    }
}
