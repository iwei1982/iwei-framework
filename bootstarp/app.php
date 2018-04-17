<?php
/**
 * Created by PhpStorm.
 * User: tanwei
 * Date: 18-4-17
 * Time: 下午3:06
 */

$app = new Core\Foundation\Applicaction(
    realpath(__DIR__.'/../')
);

$app->singleton(
    Core\Interfaces\Http\Kernel::class,
    App\Http\Kernel::class
);

return $app;