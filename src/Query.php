<?php

namespace Builder;

class Query implements QueryInterface
{
    protected $select;
    protected $where;
    protected $table;
    protected $limit = null;
    protected $offset = null;
    protected $order = null;
    protected $db;
    protected $sqlQuery;
    /**
     * @inheritDoc
     */
    public function __construct(QueryBuilderInterface $queryBuilder)
    {
        $this->select = $queryBuilder->getSelect();
        $this->where = $queryBuilder->getWhere();
        $this->table = $queryBuilder->getTable();
        $this->limit = $queryBuilder->getLimit();
        $this->offset = $queryBuilder->getOffset();
        $this->order = $queryBuilder->getOrder();
        $this->db = $queryBuilder->getDb();
        $this->sqlQuery = "$this->select $this->table $this->where $this->order $this->limit $this->offset";
    }

    public function one(): array
    {
        return $this->db->fetchOne($this->sqlQuery);
    }

    /**
     * @inheritDoc
     */
    public function all(): array
    {
        return $this->db->fetchAll($this->sqlQuery);
    }
}