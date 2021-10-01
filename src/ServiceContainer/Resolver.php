<?php

namespace Dark\ServiceContainer;

use Dark\Collection\Collection;
use ReflectionClass;
use ReflectionMethod;

class Resolver
{
    use Collection;

    public function handler(string $class, string $method = null)
    {
        $ref = new \ReflectionClass($class);

        $instance = $this->instance($ref);

        if (!$method) {
            return $instance;
        }

        $refMethod = new \ReflectionMethod($instance, $method);

        $parameters = $this->parameters($refMethod);

        // Equivale a $instance->$method($parameters);
        return call_user_func_array([$instance, $method], $parameters);
    }

    public function instance(ReflectionClass $reflectionClass)
    {
        $constructor = $reflectionClass->getConstructor();

        if (!$constructor) {
            return $reflectionClass->newInstance();
        }

        $parameters = $this->parameters($constructor);

        return $reflectionClass->newInstanceArgs($parameters);
    }

    public function parameters(ReflectionMethod $reflectionMethod):array
    {
        $parameters = [];
        foreach ($reflectionMethod->getParameters() as $param) {
            $paramType = (string) $param->getType();

            $offsetExists = $this->offsetExists($paramType);

            if ($param->getType() && $offsetExists) {
                $parameters[] = $this->offsetGet($paramType);
                continue;
            }

            if ($param->getType()) {
                $paramName = $param->getType()->getName();
                $parameters[] = $this->handler($paramName);
                continue;   
            }

            if ($param->isOptional()) {
                $parameters[] = $param->getDefaultValue();
                continue;
            }
        }

        return $parameters;
    }
}
