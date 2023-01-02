<?php



namespace Ahmed\Mvc\Storage;

use Ahmed\Mvc\Contracts\Storage\StorageInterface;
use Ahmed\Mvc\Contracts\Storage\TypeInterface;
use Ahmed\Mvc\Cookies\Cookies;
use Ahmed\Mvc\Env\Env;
use Ahmed\Mvc\Session\Session;

class Storage extends TypeInterface implements StorageInterface
{
  public static function type()
  {
    return Env::env("STORAGE_TYPE");
  }

  public function set(string $key, mixed $value, int $time, $path): void
  {
    // Try To Handle Storage Class
  }

  public function get(string $key): mixed
  {
  }

  public function destroy($key): void
  {
  }
}
