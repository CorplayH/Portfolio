<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 28/06/19
 * Time: 10:55 PM
 */



function uToken()
{
    $url = $_SERVER['HTTP_HOST'];
//         strpos returns boolean
    if (strpos($url , 'https://') !== false){
        $url = str_replace('https://','',$url);
        $uToken = 'uToken_'.explode('.',$url)[0];
    }elseif (strpos($url , 'http://') !== false){
        $url = str_replace('http://','',$url);
        $uToken = 'uToken_'.explode('.',$url)[0];
    }else{
        $uToken = 'uToken_'.explode('.',$url)[0];
    };
    return $uToken;
}


