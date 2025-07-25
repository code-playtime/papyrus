<?php
    use Devyuha\Lunaris\Facades\Flash;

    $errorHtml = ' 
        <div class="alert alert-danger">
            @message
        </div>
    ';
    Flash::render("error", $errorHtml);

    $successHtml = ' 
        <div class="alert alert-success">
            @message
        </div>
    ';
    Flash::render("success", $successHtml);
?>
