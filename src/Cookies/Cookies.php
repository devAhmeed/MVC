<?php



namespace Ahmed\Mvc\Cookies;


use Ahmed\Mvc\Contracts\Storage\TypeInterface;

class Cookies extends TypeInterface
{

  public function set(string $key, mixed $value, int $time, $path): void
  {
    setcookie($key, $value, $time, $path);
  }
  public  function get(string $key): mixed
  {
    return $_COOKIE[$key];
  }
  public  function destroy($key): void
  {
    // unset($_COOKIE["$key"]); // Will Delete Cookie only from array not browser
    setcookie($key, " ", time() - 3600, '/');
  }
}
