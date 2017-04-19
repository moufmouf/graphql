<?php


namespace Mouf\GraphQL;


use Mouf\Database\TDBM\TDBMService;
use Youshido\GraphQL\Execution\ResolveInfo;

class TdbmListResolver implements FieldResolverInterface
{
    /**
     * @var TDBMService
     */
    private $tdbmService;
    /**
     * @var string
     */
    private $table;
    /**
     * @var string
     */
    private $where;
    /**
     * @var string
     */
    private $order;
    /**
     * @var array
     */
    private $additionalTablesFetch;

    /**
     * TdbmListResolver constructor.
     * @param TDBMService $tdbmService
     * @param string $table
     * @param string|null $where
     * @param string|null $order
     * @param string[] $additionalTablesFetch
     */
    public function __construct(TDBMService $tdbmService, string $table, string $where = null, string $order = null, array $additionalTablesFetch = [])
    {
        $this->tdbmService = $tdbmService;
        $this->table = $table;
        $this->where = $where;
        $this->order = $order;
        $this->additionalTablesFetch = $additionalTablesFetch;
    }

    public function __invoke($value, array $args, ResolveInfo $info)
    {
        return $this->tdbmService->findObjects($this->table, $this->where, $args, $this->order, $this->additionalTablesFetch);
    }
}
