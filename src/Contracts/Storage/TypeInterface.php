<?php


namespace Ahmed\Mvc\Contracts\Storage;



abstract class TypeInterface
{
  public  abstract function set(string $key, mixed $value, int $time, $path): void;
  public  abstract function get(string $key): mixed;
  public  abstract function destroy($key): void;
}
