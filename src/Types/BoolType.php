<?php


namespace Mouf\GraphQL\Types;


class BoolType implements Type
{
    public function toGraphQLObject(): \GraphQL\Type\Definition\Type
    {
        return \GraphQL\Type\Definition\Type::boolean();
    }
}