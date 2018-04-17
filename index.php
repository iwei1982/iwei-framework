<?php
/**
 * Created by PhpStorm.
 * User: tanwei
 * Date: 18-3-28
 * Time: 上午11:22
 */
ini_set('display_errors',1);
define('DS',DIRECTORY_SEPARATOR);
define('APP_PATH','app');
require_once __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstarp/app.php';

$kernel = $app->make(Core\Interfaces\Http\Kernel::class);
var_dump($kernel);die();
$response = $kernel->handle(
);

$response->send();

$kernel->terminate($request, $response);