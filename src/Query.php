<?php
namespace Mouf\GraphQL;

use Mouf\GraphQL\Types\Type;

/**
 * Represents a GraphQL query.
 */
class Query
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Type
     */
    private $type;
    /**
     * @var string
     */
    private $description;
    /**
     * @var Type[]
     */
    private $arguments;
    /**
     * @var callable|FieldResolverInterface|null
     */
    private $resolve;
    /**
     * @var string
     */
    private $deprecationReason;

    /**
     * @param string $name
     * @param Type $type
     * @param string $description
     * @param array<string,Type> $arguments
     * @param callable|FieldResolverInterface|null $resolve
     * @param string|null $deprecationReason
     */
    public function __construct(string $name, Type $type, string $description = null, array $arguments = [], callable $resolve = null, string $deprecationReason = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->description = $description;
        $this->arguments = $arguments;
        $this->resolve = $resolve;
        $this->deprecationReason = $deprecationReason;
    }

    public function toGraphQLObject()
    {
        return new \Youshido\GraphQL\Type\Object\ObjectType($this->toConfig());
    }

    public function toConfig()
    {
        return [
            'name' => $this->name,
            'type' => $this->type->toGraphQLObject(),
            'description' => $this->description,
            'args' => array_map(function(Type $argument) {
                return $argument->toGraphQLObject();
            }, $this->arguments),
            'resolve' => $this->resolve,
            'deprecationReason' => $this->deprecationReason
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
