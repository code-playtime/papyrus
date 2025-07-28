<?php

namespace Module\Auth\Controllers;

use Devyuha\Lunaris\Http\Controller;
use Devyuha\Lunaris\Facades\Flash;

use Module\Auth\Queries\GetUserCount;
use Module\Auth\Requests\RegisterRequest;
use Module\Auth\Requests\LoginRequest;
use Module\Auth\Services\RegisterService;
use Module\Auth\Services\LoginService;
use Module\Auth\Requests\SetupRequest;
use Module\Auth\Services\SetupService;
use Module\Auth\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        echo "This is the Auth module.";
    }

    public function register()
    {
        return view("register", ["module" => "Auth"]);
    }

    public function login()
    {
        return view("login", ["module" => "Auth"]);
    }

    public function setup()
    {
        return view("setup", ["module" => "Auth"]);
    } 

    public function addUser()
    {
        $request = new RegisterRequest();
        if (!$request->validated()) {
            Flash::make("error", $request->errors());
            return response()->redirect(route("auth.register"));
        }

        $service = new RegisterService();
        $response = $service->addUser($request);
        $responseStatus = $response->getSuccess() ? "success" : "error";
        Flash::make($responseStatus, $response->getMessage());

        return response()->redirect(route("auth.register"));
    }

    public function loginUser()
    {
        $request = new LoginRequest();
        if (!$request->validated()) {
            Flash::make("error", $request->errors());
            return response()->redirect(route("auth.login"));
        }

        $service = new LoginService();
        $response = $service->loginUser($request);

        if(!$response->getSuccess()) {
            Flash::make("error", $response->getMessage());
            return response()->redirect(route("auth.login"));
        }

        $url = $response->getData()["url"];
        return response()->redirect($url);
    }

    public function addSetup() {
        $request = new SetupRequest();
        if(!$request->validated()) {
            Flash::make("error", $request->errors());
            return response()->redirect(route("auth.setup"));
        }

        $service = new SetupService();
        $response = $service->addQuestions($request);

        $responseStatus = $response->getSuccess() ? "success" : "error";
        $data = $response->getData();
        Flash::make($responseStatus, $response->getMessage());
        return response()->redirect($data["url"]);
    }

    public function logout() {
        Auth::delete();

        Flash::make("success", "Successfully logged out!");
        return response()->redirect(route("auth.login"));
    }
}
