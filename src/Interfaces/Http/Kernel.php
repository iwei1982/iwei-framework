<?php
/**
 * Created by PhpStorm.
 * User: tanwei
 * Date: 18-4-17
 * Time: 上午9:46
 */
namespace Core\Interfaces\Http;
interface  Kernel
{

    public function bootstrap();

    public function handle($request);

    public function terminate($request,$response);

    public function getApplicatcion();
}