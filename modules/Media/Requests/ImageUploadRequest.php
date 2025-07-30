<?php

    namespace Module\Media\Requests;

    use Devyuha\Lunaris\Http\Request;

    use Module\Main\Traits\Validateable;
    
    class ImageUploadRequest extends Request
    {
        use Validateable;

        protected function handle() {
            // add/modify request data
        }

        protected function validate() {
            $this->field("image", $this->file("image"))
                ->file("Image is not a valid file")
                ->mimes(["image/jpeg", "image/png", "image/gif"], "Image is not a valid image")
                ->max_size(5, "Image must be less than 5MB");
        }
    }
