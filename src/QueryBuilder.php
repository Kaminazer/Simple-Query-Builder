<?php

namespace Builder;

class QueryBuilder implements QueryBuilderInterface
{
    protected $select;
    protected $where;
    protected $table;
    protected $limit = null;
    protected $offset = null;
    protected $order = null;
    protected $db;

    /**
     * @inheritDoc
     */
    public function select($columns): BuilderInterface
    {
        $columns = implode(',', $columns);
        $this->select = "SELECT $columns";
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSelect()
    {
        return $this->select;
    }

    /**
     * @return mixed
     */
    public function getWhere()
    {
        return $this->where;
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }


    /**
     * @inheritDoc
     */
    public function where($conditions): BuilderInterface
    {
        // TODO: Implement where() method.
        foreach ($conditions as $name => $value)
        {
            $condition = "$name = '$value'";
        }
        $this->where = "WHERE $condition";
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function table($table): BuilderInterface
    {
        // TODO: Implement table() method.
        $this->table = "FROM $table";
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function limit($limit): BuilderInterface
    {
        // TODO: Implement limit() method.
        $this->limit = "LIMIT $limit";
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function offset($offset): BuilderInterface
    {
        // TODO: Implement offset() method.
        $this->offset = "OFFSET $offset";
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function order($order): BuilderInterface
    {
        // TODO: Implement order() method.
        foreach ($order as $name => $value)
        {
            $orderValue = "$name $value";
        }
        $this->order = "ORDER BY $orderValue";
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDb(Db $db): QueryBuilderInterface
    {
        $this->db = $db;
        return $this;
    }


    /**
     * @inheritDoc
     */
    public function getQuery(): QueryInterface
    {
        return new Query($this);
    }
}