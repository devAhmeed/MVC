<?php

namespace Ahmed\Mvc\Database;

use Ahmed\Mvc\Contracts\Database\DatabaseInterface;
use Ahmed\Mvc\Env\Env;

class DB implements DatabaseInterface
{

  var object $connection;
  var string $sql;
  public static string $table;

  function __construct()
  {
    $this->connection = mysqli_connect(Env::env("DB_HOST"), Env::env("DB_USERNAME"), Env::env("DB_PASSWORD"), Env::env("DB_DATABASE"));
  }

  static function table($table)
  {
    self::$table = $table;
    return new static;
  }

  function select(string $columns = "*"): object
  {
    $table = self::$table;
    $this->sql = "SELECT $columns FROM `$table` ";
    return $this;
  }

  function delete(): object
  {
    $table = self::$table;

    $this->sql = "DELETE FROM `$table` ";
    return $this;
  }

  function insert(array $data): object
  {
    $table = self::$table;

    $columns = "";
    $values = "";
    foreach ($data as $key => $value) {
      $columns .= "`$key` ,";
      $values .=  "'$value' ,";
    }
    $columns = rtrim($columns, ",");
    $values = rtrim($values, ",");

    $this->sql = "INSERT INTO `$table` ($columns) VALUES ($values)";
    return $this;
  }

  function where(string $column, string $value, string $operator = "="): object
  {
    $this->sql .= "WHERE `$column` $operator '$value'";
    return $this;
  }

  function excute(): int
  {
    mysqli_query($this->connection, $this->sql);
    return mysqli_affected_rows($this->connection);
  }
  function all(): array
  {
    $query = mysqli_query($this->connection, $this->sql);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
  }

  function first(): array
  {
    $query = mysqli_query($this->connection, $this->sql);
    return mysqli_fetch_assoc($query);
  }
}
