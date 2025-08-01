<?php
    use Devyuha\Lunaris\Facades\Flash;

    $errorHtml = ' 
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            @message
        </div>
    ';
    Flash::render("error", $errorHtml);

    $successHtml = ' 
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            @message
        </div>
    ';
    Flash::render("success", $successHtml);
?>
