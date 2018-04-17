<?php
/**
 * Created by PhpStorm.
 * User: tanwei
 * Date: 18-4-17
 * Time: 上午9:58
 */

namespace Core\Foundaction\Http;

use Core\Foundaction\Applicaction;
use Core\Routing\Router;
use Core\Interfaces\Http\Kernel as KernelInterface;
class Kernel implements KernelInterface
{
    protected $app;

    protected $router;

    protected $bootstrappers = [];

    protected $middleware = [];

    protected $routerMiddleware = [];


    public function __construct(Applicaction $app,Router $router)
    {
        $this->app = $app;
        $this->router = $router;
    }

    public function bootstrap()
    {
        // TODO: Implement bootstrap() method.
    }

    public function handle($request)
    {
        // TODO: Implement handle() method.
    }

    public function terminate($request, $response)
    {
        // TODO: Implement terminate() method.
    }
    public function getApplicatcion()
    {
        // TODO: Implement getApplicatcion() method.
    }
}