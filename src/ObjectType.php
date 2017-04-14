<?php


namespace Mouf\GraphQL;


class ObjectType extends \GraphQL\Type\Definition\ObjectType
{
    /**
     * @param string $name
     * @param array<string,Field> $fields
     * @param string $description
     * @param array $interfaces
     * @param callable|null $resolveField
     */
    public function __construct(string $name, array $fields, string $description = '', array $interfaces = [], callable $resolveField = null)
    {
        $targetFields = [];
        foreach ($fields as $key => $field) {
            $targetFields[$key] = $field->toConfig();
        }

        $config = [
            'name' => $name,
            'fields' => $targetFields,
            'description' => $description,
            'interfaces' => $interfaces
        ];

        if ($resolveField) {
            $config['resolveField'] = $resolveField;
        } else {
            $config['resolveField'] = function($obj, $args, $context, \GraphQL\Type\Definition\ResolveInfo $info) {
                $getter = 'get'.$info->fieldName;
                return $obj->$getter();
            };
        }

        parent::__construct($config);
    }
}
