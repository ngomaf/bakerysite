<?php

namespace App\models;

use Resources\helpers\Model;
use Resources\helpers\DataBase;
use Exception;

/**
 * Model Bread
 * CRUD completo para a tabela `breads` com relacionamento para `types`.
 */
class Bread extends Model
{
	protected string $table = 'breads';

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
	public function create(array $data): bool|array
	{
		try {
			$sql = "INSERT INTO {$this->table} (type_id, name, slug, description, price, weight, size, image) VALUES (:type_id, :name, :slug, :description, :price, :weight, :size, :image)";
			$stmt = $this->prepare($sql);
			return $stmt->execute([
				':type_id' => $data['type_id'] ?? null,
				':name' => $data['name'] ?? null,
				':slug' => $data['slug'] ?? null,
				':description' => $data['description'] ?? null,
				':price' => $data['price'] ?? 0.00,
				':weight' => $data['weight'] ?? null,
				':size' => $data['size'] ?? 'medio',
				':image' => $data['image'] ?? null,
			]);
		} catch (Exception $e) {
			return $this->modelError($e);
		}
	}

	// READ all
	public function all(): array
	{
		try {
			$sql = "SELECT b.*, t.name AS type_name, t.slug AS type_slug FROM {$this->table} b JOIN types t ON b.type_id = t.id ORDER BY b.id DESC";
			$stmt = $this->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			return $this->modelError($e);
		}
	}

	// READ by id
	public function find(int $id): array|object
	{
		try {
			$sql = "SELECT b.*, t.name AS type_name, t.slug AS type_slug FROM {$this->table} b JOIN types t ON b.type_id = t.id WHERE b.id = :id LIMIT 1";
			$stmt = $this->prepare($sql);
			$stmt->execute([':id' => $id]);
			return $stmt->fetch() ?: [];
		} catch (Exception $e) {
			return $this->modelError($e);
		}
	}

	// READ by slug
	public function findBySlug(string $slug): array|object
	{
		try {
			$sql = "SELECT b.*, t.name AS type_name, t.slug AS type_slug FROM {$this->table} b JOIN types t ON b.type_id = t.id WHERE b.slug = :slug LIMIT 1";
			$stmt = $this->prepare($sql);
			$stmt->execute([':slug' => $slug]);
			return $stmt->fetch() ?: [];
		} catch (Exception $e) {
			return $this->modelError($e);
		}
	}

	// READ by type slug
	public function findByType(string $typeSlug): array
	{
		try {
			$sql = "SELECT b.*, t.name AS type_name, t.slug AS type_slug FROM {$this->table} b JOIN types t ON b.type_id = t.id WHERE t.slug = :slug ORDER BY b.id DESC";
			$stmt = $this->prepare($sql);
			$stmt->execute([':slug' => $typeSlug]);
			return $stmt->fetchAll();
		} catch (Exception $e) {
			return $this->modelError($e);
		}
	}

	// UPDATE
	public function update(int $id, array $data): bool|array
	{
		try {
			$sql = "UPDATE {$this->table} SET type_id = :type_id, name = :name, slug = :slug, description = :description, price = :price, weight = :weight, size = :size, image = :image, updated_at = CURRENT_TIMESTAMP WHERE id = :id";
			$stmt = $this->prepare($sql);
			return $stmt->execute([
				':id' => $id,
				':type_id' => $data['type_id'] ?? null,
				':name' => $data['name'] ?? null,
				':slug' => $data['slug'] ?? null,
				':description' => $data['description'] ?? null,
				':price' => $data['price'] ?? 0.00,
				':weight' => $data['weight'] ?? null,
				':size' => $data['size'] ?? 'medio',
				':image' => $data['image'] ?? null,
			]);
		} catch (Exception $e) {
			return $this->modelError($e);
		}
	}

	// DELETE
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

