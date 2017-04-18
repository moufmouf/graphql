<?php


namespace Mouf\GraphQL\Types;


class IdType implements Type
{
    public function toGraphQLObject(): \GraphQL\Type\Definition\Type
    {
        return \GraphQL\Type\Definition\Type::id();
    }
}