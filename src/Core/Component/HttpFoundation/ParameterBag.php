<?php
/**
 * Created by PhpStorm.
 * User: tanwei
 * Date: 2017/11/19
 * Time: 22:30
 */

namespace Iwei\Component\HttpFoundation;


class ParameterBag implements \IteratorAggregate,\Countable
{

    private $parameters;
    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    public function all()
    {
        return $this->parameters;
    }

    public function keys()
    {
        return array_keys($this->parameters);
    }

    public function replaceParames(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    public function get($key,$default = null)
    {
        return array_key_exists($key,$this->parameters) ? $this->parameters[$key] : $default;
    }

    public function set($key,$value)
    {
        $this->parameters[$key] = $value;
    }

    public function has($key)
    {
        return array_key_exists($key,$this->parameters);
    }

    public function remove($key)
    {
        unset($this->parameters[$key]);
    }
    public function getIterator()
    {
        return new \ArrayIterator($this->parameters);
        // TODO: Implement getIterator() method.
    }
    public function count()
    {
        return count($this->parameters);
        // TODO: Implement count() method.
    }
}