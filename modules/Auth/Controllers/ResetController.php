<?php

    namespace Module\Auth\Controllers;

    use Papyrus\Http\Controller;
    use Papyrus\Facades\Flash;

    use Module\Auth\Requests\ResetRequest;
    use Module\Auth\Services\ResetService;
    
    class ResetController extends Controller
    {
        public function reset() {
            return view("reset")->module("Auth")->render();
        }

        public function resetPassword() {
            $request = new ResetRequest();
            if(!$request->validated()) {
                Flash::make("error", $request->errors());
                return response()->redirect(route("auth.reset"));
            }

            $service = new ResetService();
            $response = $service->resetPassword($request);
            $status = $response->getSuccess() ? "success" : "error";
            $url = $response->getData()["url"];

            Flash::make($status, $response->getMessage());
            return response()->redirect($url);
        }
    }
