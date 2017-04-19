<?php


namespace Mouf\GraphQL\Types;


use Youshido\GraphQL\Type\TypeInterface;

class IdType implements Type
{
    public function toGraphQLObject(): TypeInterface
    {
        return new \Youshido\GraphQL\Type\Scalar\IdType();
    }
}