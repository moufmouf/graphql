<?php


namespace Mouf\GraphQL;


use GraphQL\Type\Definition\ResolveInfo;

interface FieldResolverInterface
{
    public function __invoke($value, $args, $context, ResolveInfo $info);
}