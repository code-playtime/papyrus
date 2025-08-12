<?php

use Module\Auth\Facades\AuthUser;

function form_method($method = "DELETE")
{
    return '<input type="hidden" name="_method" value="' . $method . '">';
}

function auth()
{
    return AuthUser::init();
}
