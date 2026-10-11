<?php

namespace Module\Auth\Requests;

use Papyrus\Http\Request;
use Papyrus\Http\Traits\Validateable;

class SetupRequest extends Request
{
    use Validateable;

    protected function secure()
    {
        return ["answer_1", "answer_2", "answer_3"];
    }

    protected function handle()
    {
        // add/modify request data
    }

    protected function validate()
    {
        $this->field("question_1", $this->input("question_1"))
            ->required("Question 1 is required");

        $this->field("answer_1", $this->input("answer_1"))
            ->required("Answer 1 is required")
            ->max_length(255, "Answer 1 max length should be less than 255 characters.");

        $this->field("question_2", $this->input("question_2"))
            ->required("Question 2 is required");

        $this->field("answer_2", $this->input("answer_2"))
            ->required("Answer 2 is required")
            ->max_length(255, "Answer 2 max length should be less than 255 characters.");
        ;

        $this->field("question_3", $this->input("question_3"))
            ->required("Question 3 is required");

        $this->field("answer_3", $this->input("answer_3"))
            ->required("Answer 3 is required")
            ->max_length(255, "Answer 3 max length should be less than 255 characters.");
    }
}
