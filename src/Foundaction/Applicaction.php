<?php
/**
 * Created by PhpStorm.
 * User: tanwei
 * Date: 18-4-16
 * Time: 下午1:46
 */

namespace Core\Foundaction;


class Applicaction
{
    const VERSION = '1.0.0';

    public $basePath = __DIR__;

    public $aliases = [];

    public $with = [];

    public function __construct($path = null)
    {
        if($path)
        {
           $this->setBasePath($path);
        }
        $this->registerBaseConfig();
    }

    public function setBasePath($basePath)
    {
        $this->basePath = rtrim($basePath,'\/');
    }

    public function registerBaseConfig()
    {


    }

    public function make($abstract,array $param = [])
    {
        $abstract = $this->getAlias($abstract);
        $this->with[] = $param;

        array_pop($this->with);
        $object = $this->build($abstract);
        return $object;
    }

    public function getAlias($abstract)
    {
        if (! isset($this->aliases[$abstract])) {
            return $abstract;
        }

        return $this->getAlias($this->aliases[$abstract]);
    }


    protected function build($concrete)
    {

        $reflector = new \ReflectionClass($concrete);
         var_dump($reflector);die();
        if (! $reflector->isInstantiable()) {
            return 'sdfsd';
        }


        $constructor = $reflector->getConstructor();

        // If there are no constructors, that means there are no dependencies then
        // we can just resolve the instances of the objects right away, without
        // resolving any other types or dependencies out of these containers.
        if (is_null($constructor)) {
            return new $concrete;
        }

        $dependencies = $constructor->getParameters();

        // Once we have all the constructor's parameters we can create each of the
        // dependency instances and then use the reflection instances to make a
        // new instance of this class, injecting the created dependencies in.
        $instances = $this->resolveDependencies(
            $dependencies
        );

        array_pop($this->buildStack);

        return $reflector->newInstanceArgs($instances);
    }
}