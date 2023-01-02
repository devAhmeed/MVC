<?php


namespace Ahmed\Mvc\Contracts\Database;


interface DatabaseInterface
{
  public function insert(array $data): object;
  public function where(string $column, string $value, string $operator = "="): object;
  public function excute(): int;
  public function all(): array;
  public function first(): array;
  public function select(string $columns = "*"): object;
  public function delete(): object;
}
