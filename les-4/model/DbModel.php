<?php
namespace app\model;
use app\engine\Db;
use app\interfaces\IModel;

abstract class DbModel extends Models implements IModel
{

  /**
   * @var Db
   */

  public static function getOne($id) {
    $tableName = static::getTableName();
    $sql = "SELECT * FROM `{$tableName}` WHERE `id` = :id";
    return Db::getInstance()->queryObject($sql, [':id' => $id], static::class);
  }

  public static function getAll() {
    $tableName = static::getTableName();
    $sql = "SELECT * FROM `{$tableName}`";
    return Db::getInstance()->queryAll($sql);
  }

// CRUD блок

  public function save() {
    is_null($this->id) ? $this->insert() : $this->update();
  }


  public function insert() {
    $tableName = static::getTableName();

    $columns = [];
    $params = [];

    foreach ($this as $key => $value) {
      if ($key == 'id' || $key == 'properties') continue;

      $columns[] = $key;
      $params[":{$key}"] = $value;
    }

    $columns = "`" . implode('`, `', $columns) . "`";
    $values = implode(', ', array_keys($params));

    $sql = "INSERT INTO `{$tableName}` ({$columns}) VALUES ({$values})";
    Db::getInstance()->execute($sql, $params);

    $this->setId(Db::getInstance()->lastInsertId());

    $this->propertiesAllFalse();

  }

  public function update() {
    $tableName = static::getTableName();

    $params = [];
    $alter = [];

    foreach ($this as $key => $value) {
      if ($key == 'id' || $key == 'properties') continue;
      if ($this->properties[$key] == false) continue;
      $params[":{$key}"] = $value;
      $alter[] .= "`" . $key . "` = :" . $key;
    }
    $alter = implode(", ", $alter);
    $params[':id'] = $this->id;

    $sql = "UPDATE `{$tableName}` SET {$alter} WHERE `id` = :id";

    Db::getInstance()->execute($sql, $params);
    $this->propertiesAllFalse();
  }

  public function delete() {
    $tableName = static::getTableName();
    $sql = "DELETE FROM `{$tableName}` WHERE `id` = :id";
    return Db::getInstance()->execute($sql, [':id' => $this->id]);
  }
}