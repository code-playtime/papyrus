<?php

    namespace Module\Auth\Controllers;

    use Papyrus\Http\Controller;
    use Papyrus\Facades\Flash;

    use Module\Auth\Requests\ForgotRequest;
    use Module\Auth\Services\ForgotService;
    use Module\Auth\Requests\VerifyRequest;
    
    class ForgotController extends Controller
    {
        public function forgot()
        {
            return view("forgot")->module("Auth")->render();
        }

        public function verify() {
            $service = new ForgotService();
            $response = $service->getVerifyData();

            if(!$response->getSuccess()) {
                Flash::make("error", $response->getMessage());
            }
            
            return view("verify", $response->getData())->module("Auth")->render();
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

        public function verifyAnswers() {
            $request = new VerifyRequest();
            if(!$request->validated()) {
                Flash::make("error", $request->errors());
                return response()->redirect(route("auth.verify"));
            }

            $service = new ForgotService();
            $response = $service->verifyAnswers($request);
            $responseStatus = $response->getSuccess() ? "success" : "error";
            $url = $response->getData()["url"];

            Flash::make($responseStatus, $response->getMessage());
            return response()->redirect($url);
        }
    }
