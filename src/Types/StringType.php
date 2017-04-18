<?php


namespace Mouf\GraphQL\Types;


class StringType implements Type
{
    public function toGraphQLObject(): \GraphQL\Type\Definition\Type
    {
        return \GraphQL\Type\Definition\Type::string();
    }
}