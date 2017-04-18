<?php


namespace Mouf\GraphQL\Types;


interface Type
{
    public function toGraphQLObject() : \GraphQL\Type\Definition\Type;
}