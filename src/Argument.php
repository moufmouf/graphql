<?php


namespace Mouf\GraphQL;



use GraphQL\Type\Definition\Type;

class Argument
{
    /**
     * @var Type
     */
    private $type;
    /**
     * @var string
     */
    private $description;
    /**
     * @var mixed
     */
    private $defaultValue;

    public function __construct(Type $type, string $description = null, $defaultValue = null)
    {
        $this->type = $type;
        $this->description = $description;
        $this->defaultValue = $defaultValue;
    }

    public function toGraphQLObject()
    {
        return [
            'type' => $this->type,
            'description' => $this->description,
            'defaultValue' => $this->defaultValue
        ];
    }
}
