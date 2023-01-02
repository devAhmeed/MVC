<?php
require 'vendor/autoload.php';

use Ahmed\Mvc\Cookies\Cookies;
use Ahmed\Mvc\Database\DB;
use Ahmed\Mvc\Env\Env;
use Ahmed\Mvc\Session\Session;
use Ahmed\Mvc\Storage\Storage;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();







// $data = DB::table('categories')->select()->all();

// echo "<pre>";
// print_r($data);


echo Env::env("DB_HOST");
// $session->set($key, $value);


// $cookie = new Cookies;


// $cookie->set('hello', "Val", time() + 60 * 60 * 24 * 7 * 30 * 12, '/');
// $cookie->destroy('hello');
