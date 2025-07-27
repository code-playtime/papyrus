<?php

namespace Module\Auth\Queries;

use Devyuha\Lunaris\Facades\Query;

class GetUserByEmail extends Query
{
    public function sql()
    {
        return <<<SQL
                SELECT id, email, password FROM users WHERE email = :email;
            SQL;
    }
}

