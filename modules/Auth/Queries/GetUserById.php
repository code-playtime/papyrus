<?php

namespace Module\Auth\Queries;

use Papyrus\Database\Query;

class GetUserById extends Query
{
    public function sql()
    {
        return <<<SQL
                SELECT
                    id, name, username, email, role
                FROM
                    users
                WHERE
                    id = :id
            SQL;
    }
}

