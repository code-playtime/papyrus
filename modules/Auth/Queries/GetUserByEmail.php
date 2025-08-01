<?php

namespace Module\Auth\Queries;

use Papyrus\Facades\Query;

class GetUserByEmail extends Query
{
    public function sql()
    {
        return <<<SQL
                SELECT id, email, password FROM users WHERE email = :email;
            SQL;
    }
}

