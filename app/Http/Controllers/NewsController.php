<?php

namespace App\Http\Controllers;

class NewsController extends Controller
{
    
    public function list() {
        $news = array();
        array_push($news, "");
        array_push($news, "");
        array_push($news, "");
        return $news;
    }

}
