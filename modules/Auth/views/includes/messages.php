<?php

use Papyrus\Support\Facades\Flash;

$errorHtml = ' 
        <div class="alert alert-danger alert-dismissible">
            @message
            <button class="alert-dismissable">
                <i class="fa fa-close"></i>
            </button>
        </div>
    ';
Flash::render("error", $errorHtml);

$successHtml = ' 
        <div class="alert alert-success alert-dismissible">
            @message
            <button class="alert-dismissable">
                <i class="fa fa-close"></i>
            </button>
        </div>
    ';
Flash::render("success", $successHtml);
