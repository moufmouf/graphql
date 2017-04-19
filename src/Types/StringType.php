<?php


namespace Mouf\GraphQL\Types;


use Youshido\GraphQL\Type\TypeInterface;

class StringType implements Type
{
    public function toGraphQLObject(): TypeInterface
    {
        return new \Youshido\GraphQL\Type\Scalar\StringType();
    }
}