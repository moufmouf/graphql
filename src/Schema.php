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


    public function toGraphQLSchema() : \GraphQL\Schema
    {
        $graphQLQueries = [];
        foreach ($this->queries as $query) {
            $graphQLQueries[$query->getName()] = $query->toConfig();
        }

        $queryObj = new \GraphQL\Type\Definition\ObjectType([
            'name' => 'Query',
            'fields' => $graphQLQueries
        ]);

        return new \GraphQL\Schema([
            'query' => $queryObj
        ]);
    }
}
