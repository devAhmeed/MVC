<?php



namespace Ahmed\Mvc\Session;

use Ahmed\Mvc\Contracts\Storage\TypeInterface;

class Session extends TypeInterface
{
  public function start()
  {
    session_start();
  }
  public function set(string $key, mixed $value, int $time, $path): void
  {
    $this->start();
    $_SESSION[$key] = $value;
  }
  public  function get(string $key): mixed
  {
    return $_SESSION[$key];
  }
  public function destroy($key): void
  {
    session_destroy();
  }
}
