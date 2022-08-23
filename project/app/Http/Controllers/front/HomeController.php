<?php

namespace App\Http\Controllers\front;

use App\Article;
use App\Menu;
use App\Advertise;
use App\ArticleGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $advertise = Advertise::first();

        $articles = Article::where('active', 1)->where('publishDate', '<=', Carbon::now())->orderBy('publishDate', 'desc')->limit(5)->get();
        $firstArticle = $articles->pull(0);

        $financeArticles = Article::where('publishDate', '<=', Carbon::now())->orderBy('publishDate', 'desc')->whereHas('article_group', function ($query){
            return $query->where('title', 'اقتصادی');
        })->orderBy('publishDate', 'desc')->limit(5)->get();

        $latestArticles = Article::where('publishDate', '<=', Carbon::now())->orderBy('publishDate', 'desc')->orderBy('publishDate', 'desc')->limit(5)->get();

        $forexArticles = Article::where('publishDate', '<=', Carbon::now())->orderBy('publishDate', 'desc')->whereHas('article_group', function ($query){
            return $query->where('title', 'اقتصادی');
        })->orderBy('publishDate', 'desc')->limit(3)->get();
        $firstForexArticle = $forexArticles->pull(0);


        return view('frontEnd.index', compact('articles', 'firstArticle', 'financeArticles', 'latestArticles', 'forexArticles', 'firstForexArticle', 'advertise'));
    }
}
