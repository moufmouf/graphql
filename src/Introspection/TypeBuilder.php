<?php
namespace Mouf\GraphQL\Introspection;


use Mouf\Actions\InstallUtils;
use Mouf\GraphQL\ObjectType;
use Mouf\MoufManager;
use Mouf\MoufUtils;

/**
 * Class used to create GraphQL types automatically in Mouf from the FQCN.
 */
class TypeBuilder
{
    /**
     * @var NamingStrategy
     */
    private $namingStrategy;

    public function __construct(NamingStrategy $namingStrategy)
    {
        $this->namingStrategy = $namingStrategy;
    }

    public function buildTypes(array $classNames, MoufManager $moufManager)
    {

    }

    private function buildType(string $className, MoufManager $moufManager)
    {
        $reflectionClass = new \ReflectionClass($className);

        $typeName = $this->namingStrategy->getTypeName($reflectionClass);
        $instanceName = $this->namingStrategy->getInstanceName($reflectionClass);

        $typeDescriptor = InstallUtils::getOrCreateInstance($instanceName, ObjectType::class, $moufManager);


        $moufManager->getInstanceDescriptor($instanceName);
    }

    /**
     * @param \ReflectionClass $reflectionClass
     * @return array|\ReflectionMethod[]
     */
    public function findGetterProperties(\ReflectionClass $reflectionClass) : array
    {
        $methods = $reflectionClass->getMethods();
        return array_filter($methods, [$this, 'isGetter']);
    }

    public function isGetter(\ReflectionMethod $method) : bool
    {
        if (strpos($method->getName(), 'get') !== 0) {
            return false;
        }
        $parameters = $method->getParameters();
        if (count($parameters) === 0) {
            return true;
        }
        // If the get function has parameters, but they are optional, this is ok.
        return $parameters[0]->isOptional();
    }

    public function findReturnType
}
