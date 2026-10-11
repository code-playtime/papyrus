<?php

namespace Module\Media\Controllers;

use Papyrus\Http\Controller;
use Papyrus\Support\Storage;
use Module\Media\Requests\ImageUploadRequest;

class MediaController extends Controller
{
    public function index()
    {
        echo "This is the Media module.";
    }

    public function uploadImage()
    {
        $request = new ImageUploadRequest();
        if (!$request->validated()) {
            return response()->json([
                "success" => false,
                "errors" => $request->errors()
            ]);
        }

        $url = "";
        $success = false;

        $storage = Storage::open($_FILES["image"], date("Ymdhsi"), "media");
        if ($storage->upload()) {
            $url = $storage->getUrl();
            $success = true;
        }

        return response()->json([
            "success" => $success,
            "file" => [
                "url" => $url
            ]
        ]);
    }
}
