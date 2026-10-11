<?php

namespace Module\Auth\Facades;

use Papyrus\Support\Facades\Session;

class Auth
{
    public static $authKey = "auth";

    public static function getDashboardRoute()
    {
        return route("panel.dashboard");
    }

    public static function create($user_id)
    {
        Session::put(self::$authKey, $user_id);
    }

    public static function isActive()
    {
        return Session::has(self::$authKey);
    }

    public static function getUserId()
    {
        return Session::get(self::$authKey);
    }

    public static function delete()
    {
        if (self::isActive()) {
            Session::delete(self::$authKey);
        }
    }
}
