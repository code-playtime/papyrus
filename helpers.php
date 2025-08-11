<?php

function form_method($method = "DELETE")
{
    return '<input type="hidden" name="_method" value="' . $method . '">';
}
