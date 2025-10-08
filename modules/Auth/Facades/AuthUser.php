<?php

namespace Module\Auth\Facades;

use Papyrus\Database\Pdo;
use Module\Auth\Queries\GetUserById;
use Module\Auth\Facades\Auth;
use Exception;

class AuthUser
{
    public static $instance = null;
    private $user = null;

    public function __construct()
    {
        //
    }

    public static function init()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function user($field = null)
    {
        if ($this->user === null) {
            $this->user = $this->fetchUser();
        }

        return $this->user[$field] ?? null;
    }

    private function fetchUser()
    {
        try {
            $user_id = Auth::getUserId();
            $query = Pdo::execute(new GetUserById(["id" => $user_id]));
            $user = $query->first();
            return $user;
        } catch (Exception $e) {
            logger()->error($e->getMessage());
            return [];
        }
    }
}
