<?php

namespace Module\Main\Controllers;

use Papyrus\Http\Controller;
use Papyrus\Database\Pdo;
use Module\Main\Queries\ListUsers;
use Module\Auth\Queries\GetUserCount;
use Exception;

class MainController extends Controller
{
    public function home()
    {
        echo "This is the main module";
    }
}
