<?php

    namespace Module\Auth\Controllers;

    use Devyuha\Lunaris\Http\Controller;
    use Devyuha\Lunaris\Facades\Flash;

    use Module\Auth\Requests\ForgotRequest;
    use Module\Auth\Services\ForgotService;
    
    class ForgotController extends Controller
    {
        public function forgot()
        {
            return view("forgot", ["module" => "Auth"]);
        }

        public function verify() {
            $service = new ForgotService();
            $response = $service->getVerifyData();

            if(!$response->getSuccess()) {
                Flash::make("error", $response->getMessage());
            }
            
            return view("verify", [
                "module" => "Auth",
                "args" => $response->getData()
            ]);
        }

        public function forgotEmail() {
            $request = new ForgotRequest();
            if(!$request->validated()) {
                Flash::make("error", $request->errors());
                return response()->redirect(route("auth.forgot"));
            }

            $service = new ForgotService();
            $response = $service->forgotEmail($request);

            if(!$response->getSuccess()) {
                Flash::make("error", $response->getMessage());
                return response()->redirect(route("auth.forgot"));
            }

            Flash::make("success", $response->getMessage());
            return response()->redirect(route("auth.verify"));
        }
    }
