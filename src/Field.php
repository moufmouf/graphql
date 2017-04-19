<?php


namespace Mouf\GraphQL;


use Mouf\GraphQL\Types\Type;

class Field
{

    /**
     * @Important IfSet
     * @param Type $type
     * @param string $description
     * @param array<string,Type> $arguments $arguments
     * @param callable|FieldResolverInterface|null $resolve
     * @param string|null $deprecationReason
     */
    public function __construct(Type $type, string $description = null, array $arguments = [], callable $resolve = null, string $deprecationReason = null)
    {
        $this->type = $type;
        $this->description = $description;
        $this->arguments = $arguments;
        $this->resolve = $resolve;
        $this->deprecationReason = $deprecationReason;
    }

    public function toConfig(string $name = null) : array
    {
        $config = [
            'type' => $this->type->toGraphQLObject(),
            'description' => $this->description,
            'args' => array_map(function(Type $argument) {
                return $argument->toGraphQLObject();
            }, $this->arguments)
        ];

        if ($name) {
            $config['name'] = $name;
        }

        if ($this->deprecationReason) {
            $config['isDeprecated'] = true;
            $config['deprecationReason'] = $this->deprecationReason;
        }

        if ($this->resolve) {
            $config['resolve'] = $this->resolve;
        }

        return $config;
    }

    public function toGraphQLObject(string $name = null)
    {
        return new \Youshido\GraphQL\Field\Field($this->toConfig($name));
        //return new \GraphQL\Type\Definition\ObjectType($this->toConfig($name));
    }
}
