<?php


namespace Mouf\GraphQL\Types;


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


    public function toGraphQLObject(): \GraphQL\Type\Definition\Type
    {
        return new \GraphQL\Type\Definition\NonNull($this->type->toGraphQLObject());
    }
}