<?php

namespace App\Http\Controllers\front;

use App\Analysis;
use App\Article;
use App\Menu;
use App\ArticleGroup;
use App\Advertise;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleMenuController extends Controller
{
    public function index()
    {
        $path = \request()->path();
        $path = '/' . $path;
        $menu = Menu::where('url', $path)->first();

        $articles = Article::whereHas('article_group', function ($query) use ($menu){
            return $query->whereHas('menu', function ($q) use ($menu){
                return $q->where('id', $menu->id);
            });
        })->orderBy('publishDate', 'desc')->simplePaginate(10);

        $title = $menu->title;



        // $articles = Article::whereHas('article_group', function ($query){
        //     return $query->where('title', 'متاورس');
        // })->orderBy('created_at', 'desc')->get();

        // $title = 'Metaverse';
        // dd(ArticleGroup::where('title', 'متاورس')->get());

        return view('frontEnd.archive.index', compact('articles', 'title'));
    }

    public function allTahlil()
    {
        $authors = User::permission('تحلیلگر')->take(5);
        $analysis = Analysis::paginate(7);
        return view('frontEnd.analysis.index', compact('authors', 'analysis'));
    }

    public function allTahlilShow(Analysis $analysis)
    {
        return view('frontEnd.analysis.index');
    }

    public function authors()
    {
        $authors = User::permission('تحلیلگر')->limit(20)->get();
        return view('frontEnd.author.index', compact('authors'));
    }

    public function authorsShow(User $author)
    {
        return "this page if for $author->name author";
    }
}
