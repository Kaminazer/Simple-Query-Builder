<?php

namespace Builder;

interface DbInterface
{
    /**
     * @param string $sql
     * @return array
     */
    public function query(string $sql);
}