<?php

namespace Module\Auth\Queries;

use Papyrus\Database\Query;

class AddUserQuery extends Query
{
    public function sql()
    {
        return <<<SQL
                INSERT INTO users (name, username, email, password, role) VALUES (:name, :username, :email, :password, :role);            
            SQL;
    }
}
