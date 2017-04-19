<?php


namespace Mouf\GraphQL\Types;


use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\TypeInterface;

class ListOf implements Type
{
    /**
     * @var Type
     */
    private $type;

    /**
     * @Important
     */
    public function __construct(Type $type)
    {
        $this->type = $type;
    }


    public function toGraphQLObject(): TypeInterface
    {
        return new ListType($this->type->toGraphQLObject());
    }
}