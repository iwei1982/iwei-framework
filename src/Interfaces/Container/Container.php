<?php
/**
 * Created by PhpStorm.
 * User: tanwei
 * Date: 18-4-17
 * Time: 上午11:08
 */

namespace Core\Interfaces\Container;

use Closure;
interface Container
{

    public function bound($abstract);


    public function alias($abstract,$alias);

    public function tag($abstract,$tag);

    public function tagged($tag);

    public function bind($abstarct,$concrete=null,$shared = false);

    public function singleton($abstarct,$concrete = null);

    public function extend($abstarct,Closure $closure);

    public function instance($abstarct,$instance);

    public function when($concrete);

    public function factory($abstarct);

    public function make($abstarct,array $param = []);

    public function call($callback,array $param = [],$defaultMethod = null);


    public function resolved($abstarct);

    public function resolving($abstract, Closure $callback = null);

    public function afterResolving($abstract, Closure $callback = null);

}