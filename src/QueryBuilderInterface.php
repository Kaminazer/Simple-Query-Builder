<?php


namespace Builder;

interface QueryBuilderInterface extends BuilderInterface
{
    /**
     * @param Db $db
     * @return QueryBuilderInterface
     */
    public function setDb(Db $db): QueryBuilderInterface;

    /**
     * @return QueryInterface
     */
    public function getQuery(): QueryInterface;
}