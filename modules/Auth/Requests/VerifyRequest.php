<?php

    namespace Module\Auth\Requests;

    use Devyuha\Lunaris\Http\Request;

    use Module\Main\Traits\Validateable;
    
    class VerifyRequest extends Request
    {
        use Validateable;

        protected function secure() {
            return ["answer_1", "answer_2", "answer_3"];
        }

        protected function handle() {
            // add/modify request data
        }

        protected function validate() {
            $this->field("answer_1", $this->input("answer_1"))
                ->required("Answer 1 is required");

            $this->field("answer_2", $this->input("answer_2"))
                ->required("Answer 2 is required");

            $this->field("answer_3", $this->input("answer_3"))
                ->required("Answer 3 is required");
        }
    }
