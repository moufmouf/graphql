<?php


namespace Mouf\GraphQL\Types;


class IntType implements Type
{
    public function toGraphQLObject(): \GraphQL\Type\Definition\Type
    {
        return \GraphQL\Type\Definition\Type::int();
    }
}