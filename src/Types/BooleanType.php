<?php


namespace Mouf\GraphQL\Types;


use Youshido\GraphQL\Type\TypeInterface;

class BooleanType implements Type
{
    public function toGraphQLObject(): TypeInterface
    {
        return new \Youshido\GraphQL\Type\Scalar\BooleanType();
    }
}