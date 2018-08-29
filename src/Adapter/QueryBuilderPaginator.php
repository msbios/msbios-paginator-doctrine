<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Paginator\Doctrine\Adapter;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;

/**
 * Class QueryBuilderPaginator
 * @package MSBios\Paginator\Doctrine\Adapter
 */
class QueryBuilderPaginator extends DoctrineAdapter
{
    /**
     * QueryBuilderPaginator constructor.
     * @param QueryBuilder $queryBuilder
     * @param null $where
     * @param null $sort
     * @param null $order
     * @param null $group
     * @param null $having
     */
    public function __construct(
        QueryBuilder $queryBuilder,
        $where = null,
        $sort = null,
        $order = null,
        $group = null,
        $having = null
    ) {

        if ($where) {
            $queryBuilder->where($where);
        }

        if ($sort) {
            $queryBuilder->orderBy($sort, $order);
        }

        if ($group) {
            $queryBuilder->groupBy($group);
        }

        if ($having) {
            $queryBuilder->having($having);
        }

        parent::__construct(new ORMPaginator($queryBuilder));
    }
}
