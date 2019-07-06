<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Jorenvh\Share\Share;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('frontend.master');
    }

    public function shareButton()
    {
        $url = $_SERVER["HTTP_HOST"];
        $facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
        $twitter = 'https://twitter.com/home?status='.$url;
        $linkedIn = 'https://www.linkedin.com/shareArticle?mini=true&url='.$url;

        $data= [ 'facebook' => $facebook , 'twitter' => $twitter , 'linkedIn' => $linkedIn , ];
        $data = json_encode($data);
        return $data;
    }
}
