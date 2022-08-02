<?php

namespace App\Http\Controllers\front;

use App\Article;
use App\Menu;
use App\Advertise;
use App\ArticleGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $advertise = Advertise::first();
        
        $articles = Article::orderBy('publishDate', 'desc')->limit(5)->get();
        $firstArticle = $articles->pull(0);

        $financeArticles = Article::whereHas('article_group', function ($query){
            return $query->where('title', 'اقتصادی');
        })->orderBy('publishDate', 'desc')->limit(5)->get();

        $latestArticles = Article::orderBy('publishDate', 'desc')->limit(5)->get();

        $forexArticles = Article::whereHas('article_group', function ($query){
            return $query->where('title', 'اقتصادی');
        })->orderBy('publishDate', 'desc')->limit(3)->get();
        $firstForexArticle = $forexArticles->pull(0);
        

        return view('frontEnd.index', compact('articles', 'firstArticle', 'financeArticles', 'latestArticles', 'forexArticles', 'firstForexArticle', 'advertise'));
    }
}
