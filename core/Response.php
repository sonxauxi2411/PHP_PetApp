<?php

class Response
{

    public function redirect($uri='')
    {
        $url = _WEB_PATH_.'/'.$uri ;
        header("Location: $url");
        exit;
    }
}
