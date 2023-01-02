<?php


namespace Ahmed\Mvc\Env;



use Exception;
use Ahmed\Mvc\Contracts\Env\EnvInterface;

class Env implements EnvInterface
{
  public static function load(): array
  {
    if (file_exists("env.json")) {
      $content = file_get_contents('env.json');

      $ArrContent = json_decode($content, true);
      return $ArrContent;
    } else {
      throw new Exception("Env File Cannot be read , Check Your File");
    }
  }
  public static function env(string $key): mixed
  {
    $content = self::load();

    if (array_key_exists($key, $content)) {
      return $content[$key];
    } else {
      throw new Exception("$key Cannot Found , Check Your Key", 404);
    }
  }
}
