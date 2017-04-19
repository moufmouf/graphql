<?php


namespace Mouf\GraphQL\Types;


use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\TypeInterface;

class NonNull implements Type
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
        return new NonNullType($this->type->toGraphQLObject());
    }
}