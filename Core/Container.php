<?php
namespace Core;
use ReflectionClass;
use Exception;

class Container
{
    protected array $bindings = [];
    protected array $singletons = [];

    public function bind($abstract, $concrete = null)
    {
        $this->bindings[$abstract] = $concrete ?? $abstract;
    }

    public function singleton($abstract, $concrete = null)
    {
        $this->singletons[$abstract] = $concrete ?? $abstract;
    }

    public function resolve($abstract)
    {
       if (isset($this->singletons[$abstract])) {
    if ($this->singletons[$abstract] instanceof \Closure) {
        
        $this->singletons[$abstract] = $this->singletons[$abstract]();
    }
    return $this->singletons[$abstract];
}
        $concrete = $this->bindings[$abstract]
            ?? $this->singletons[$abstract]
            ?? $abstract;

        $object = $this->build($concrete);

        if (isset($this->singletons[$abstract])) {
            $this->singletons[$abstract] = $object;
        }

        return $object;
    }

    protected function build($concrete)
    {
        if ($concrete instanceof \Closure) {
            return $concrete();
        }

        $reflection = new ReflectionClass($concrete);

        if (!$reflection->isInstantiable()) {
            throw new Exception("Class {$concrete} is not instantiable");
        }

        $constructor = $reflection->getConstructor();

        if (is_null($constructor)) {
            return new $concrete;
        }

        $dependencies = array_map(function ($param) {
            $type = $param->getType();
            return $this->resolve($type->getName());
        }, $constructor->getParameters());

        return $reflection->newInstanceArgs($dependencies);
    }
}
