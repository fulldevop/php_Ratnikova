<?php

namespace app\model;

use app\engine\Db;
use app\model\entities\DataEntity;

abstract class Repository
{
  protected $db;

  public function __construct()
  {
    $this->db = Db::getInstance();
  }

  public function getOne($id)
  {
    $tableName = $this->getTableName();
    $sql = "SELECT * FROM `{$tableName}` WHERE `id` = :id";
    return $this->db->queryObject($sql, [':id' => $id], $this->getEntityClass());
  }

  public function getAll()
  {
    $tableName = $this->getTableName();
    $sql = "SELECT * FROM `{$tableName}`";
    return $this->db->queryAll($sql);
  }

  public function getAllWhere($field, $param)
  {
    $tableName = $this->getTableName();
    $sql = "SELECT * FROM `{$tableName}` WHERE `{$field}` = :param";
    return $this->db->queryOne($sql, [':param' => $param]);
  }

// CRUD блок

  public function save(DataEntity $entity)
  {

    is_null($entity->getId()) ? $this->insert($entity) : $this->update($entity);
  }


  public function insert(DataEntity $entity)
  {
    $tableName = $this->getTableName();
//    Log::_log($entity);

    $columns = [];
    $params = [];
//    Log::_log((array)$entity);
    $entity = (array)$entity;
//    $entity = str_replace('*', '', $entity);
    Log::_log($entity);

    foreach ($entity as $key => $value) {
      $key = str_replace('*', '', $key);
      if ($key == 'id' || $key == 'properties') continue;

      $columns[] = $key;
      $params[":{$key}"] = $value;
    }

    $columns = "`" . implode('`, `', $columns) . "`";
    $values = implode(', ', array_keys($params));
//INSERT INTO `basket` (session, id_good, quantity) VALUES ('hhbsdkh', 1, 1);
    $sql = "INSERT INTO `{$tableName}` ({$columns}) VALUES ({$values})";
    $this->db->getInstance()->execute($sql, $params);
//    Log::_log($sql);

    $entity->setId($this->db->lastInsertId());

    $this->propertiesAllFalse($entity);

  }

  public function update(DataEntity $entity)
  {
    $tableName = $this->getTableName();

    $params = [];
    $alter = [];

    foreach ($entity as $key => $value) {
      if ($key == 'id' || $key == 'properties') continue;
      if ($entity->properties[$key] == false) continue;
      $params[":{$key}"] = $value;
      $alter[] .= "`" . $key . "` = :" . $key;
    }
    $alter = implode(", ", $alter);
    $params[':id'] = $entity->getId();

    $sql = "UPDATE `{$tableName}` SET {$alter} WHERE `id` = :id";

    $this->db->execute($sql, $params);
    $this->propertiesAllFalse($entity);
  }

  public function delete(DataEntity $entity)
  {
    $tableName = $this->getTableName();
    $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
    return $this->db->execute($sql, [':id' => $entity->id]);
  }

  public function propertiesAllFalse($entity) {
    foreach ($entity->properties as $key => $value) {
      $entity->properties[$key] = false;
    }
  }

  abstract public function getTableName();
  abstract public function getEntityClass();
}