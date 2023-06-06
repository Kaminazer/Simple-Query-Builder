<?php

namespace Builder;

interface BuilderInterface
{
    /**
     * @param array|string $columns
     * @return $this
     */
    public function select($columns): BuilderInterface;

    /**
     * @param array|string $conditions
     * @return $this
     */
    public function where($conditions): BuilderInterface;

    /**
     * @param string $table
     * @return $this
     */
    public function table($table): BuilderInterface;

    /**
     * @param int $limit
     * @return $this
     */
    public function limit($limit): BuilderInterface;

    /**
     * @param int $offset
     * @return $this
     */
    public function offset($offset): BuilderInterface;

    /**
     * @param array|string $order
     * @return $this
     */
    public function order($order): BuilderInterface;
}