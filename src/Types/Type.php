<?php


namespace Mouf\GraphQL\Types;


use Youshido\GraphQL\Type\TypeInterface;

interface Type
{
    public function toGraphQLObject() : TypeInterface;
}