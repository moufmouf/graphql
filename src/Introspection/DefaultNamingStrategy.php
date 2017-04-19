<?php


namespace Mouf\GraphQL\Introspection;


class DefaultNamingStrategy implements NamingStrategy
{

    public function getTypeName(\ReflectionClass $reflectionClass): string
    {
        return lcfirst($reflectionClass->getShortName());
    }

    public function getInstanceName(\ReflectionClass $reflectionClass): string
    {
        return $this->getTypeName($reflectionClass).'Type';
    }

    public function getFieldName(\ReflectionMethod $reflectionMethod): string
    {
        return lcfirst(substr($reflectionMethod->getName(), 3));
    }
}