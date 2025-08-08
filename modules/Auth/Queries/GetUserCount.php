<?php

namespace Module\Auth\Queries;

use Papyrus\Database\Query;

class GetUserCount extends Query
{
    public function sql()
    {
        return <<<SQL
                SELECT COUNT(id) as count FROM users 
            SQL;
    }
}
