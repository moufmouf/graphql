<?php


namespace Mouf\GraphQL;


use Mouf\GraphQL\Types\Type;

class ObjectType implements Type
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $fields;
    /**
     * @var string
     */
    private $description;
    /**
     * @var array
     */
    private $interfaces;
    /**
     * @var callable|null
     */
    private $resolveField;

    /**
     * @param string $name
     * @param array<string,Field> $fields
     * @param string $description
     * @param array $interfaces
     * @param callable|null $resolveField
     */
    public function __construct(string $name, array $fields, string $description = '', array $interfaces = [], callable $resolveField = null)
    {

        $this->name = $name;
        $this->fields = $fields;
        $this->description = $description;
        $this->interfaces = $interfaces;
        $this->resolveField = $resolveField;
    }

    public function toGraphQLObject() : \GraphQL\Type\Definition\Type
    {
        $targetFields = [];
        foreach ($this->fields as $key => $field) {
            $targetFields[$key] = $field->toConfig();
        }

        $config = [
            'name' => $this->name,
            'fields' => $targetFields,
            'description' => $this->description,
            'interfaces' => $this->interfaces
        ];

        if ($this->resolveField) {
            $config['resolveField'] = $this->resolveField;
        } else {
            $config['resolveField'] = function($obj, $args, $context, \GraphQL\Type\Definition\ResolveInfo $info) {
                $getter = 'get'.$info->fieldName;
                return $obj->$getter();
            };
        }

        return new \GraphQL\Type\Definition\ObjectType($config);
    }
}
