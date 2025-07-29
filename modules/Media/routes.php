<?php

    use Devyuha\Lunaris\Http\Router;

    Router::get("/media", [Module\Media\Controllers\MediaController::class, 'index']);

    Router::post("/api/upload/image", [Module\Media\Controllers\MediaController::class, "uploadImage"])
        ->name("media.upload-image");
