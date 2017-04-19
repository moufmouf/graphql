<?php


namespace Mouf\GraphQL;


use Youshido\GraphQL\Execution\ResolveInfo;

interface FieldResolverInterface
{
    public function __invoke($value, array $args, ResolveInfo $info);
}