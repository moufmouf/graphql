<?php


namespace Mouf\GraphQL;


class Schema
{
    /**
     * @var array|Query[]
     */
    private $queries;

    /**
     * @param Query[] $queries
     */
    public function __construct(array $queries)
    {
        $this->queries = $queries;
    }


    public function toGraphQLSchema() : \Youshido\GraphQL\Schema\Schema
    {
        $graphQLQueries = [];
        foreach ($this->queries as $query) {
            $graphQLQueries[$query->getName()] = $query->toConfig();
        }

        $queryObj = new \Youshido\GraphQL\Type\Object\ObjectType([
            'name' => 'RootQueryType',
            'fields' => $graphQLQueries
        ]);

        return new \Youshido\GraphQL\Schema\Schema([
            'query' => $queryObj
        ]);
    }
}
