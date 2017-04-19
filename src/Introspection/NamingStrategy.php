<?php


namespace Mouf\GraphQL\Introspection;

/**
 * Gives graphQL names
 */
interface NamingStrategy
{
    public function getTypeName(\ReflectionClass $reflectionClass) : string;

    public function getInstanceName(\ReflectionClass $reflectionClass) : string;

    public function getFieldName(\ReflectionMethod $reflectionMethod) : string;

}