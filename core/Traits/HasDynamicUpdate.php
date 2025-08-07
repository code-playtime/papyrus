<?php

namespace Papyrus\Traits;

trait HasDynamicUpdate
{
    protected $fields = [];
    protected $sql = "";
    protected $whereClause = "";

    public function start($tableName)
    {
        $this->sql = "UPDATE " . $tableName . " SET ";
    }

    public function update($column, $key)
    {
        $this->fields[] = "$column = $key";
    }

    public function where($whereClause)
    {
        $this->whereClause = $whereClause;
    }

    public function getQuery()
    {
        $query = $this->sql;
        $query .= implode(", ", $this->fields);
        $query .= " " . $this->whereClause;
        return $query;
    }
}
