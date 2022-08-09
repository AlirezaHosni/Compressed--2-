<?php

namespace App\Http\Controllers\front;

use App\Article;
use App\Http\Controllers\Controller;
use App\Landing;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function show($url)
    {
        $landing = Landing::where('url', $url)->first();
        $bankArticles = Article::whereHas('article_group', function ($query){
            return $query->where('title', 'بانک ها');
        })->orderBy('publishDate', 'desc')->limit(9)->get();
        return view('frontEnd.landing.show', compact('landing', 'bankArticles'));
    }
}
