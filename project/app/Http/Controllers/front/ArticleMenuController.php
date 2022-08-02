<?php

namespace App\Http\Controllers;

use App\Article;
use App\Menu;
use App\ArticleGroup;
use App\Advertise;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class MetaverseController extends Controller
{
    public function index()
    {
        $path = \request()->path();
        $path = '/' . $path;
        $menu = App\Menu::where('url', $path)->first();

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
}
