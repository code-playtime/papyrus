<?php

namespace Module\Auth\Queries;

use Papyrus\Database\Query;

class UpdatePasswordByEmail extends Query
{
    public function sql()
    {
        return <<<SQL
                UPDATE users SET password = :password WHERE email = :email;
            SQL;
    }
}
