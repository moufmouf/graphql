<?php


namespace Mouf\GraphQL\Types;


class FloatType implements Type
{
    public function toGraphQLObject(): \GraphQL\Type\Definition\Type
    {
        return \GraphQL\Type\Definition\Type::float();
    }
}