<?php
    use Devyuha\Lunaris\Facades\Flash;

    $html = ' 
        <div class="alert alert-danger">
            @message
        </div>
    ';

    Flash::render("error", $html);
?>
