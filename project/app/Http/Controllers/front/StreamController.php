<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticleGroup;

class StreamController extends Controller
{
    public function index(ArticleGroup $articleGroup=null)
    {
        $articles = Article::where('shortNews', 1)->simplePaginate(10);
        if(!is_null($articleGroup)){
            $articles = $articles->where('article_Group_id', $articleGroup->id);
        }
        $articleGroups = ArticleGroup::where('shortNews', 1)->get();

        return view('frontEnd.stream.index', compact('articles', 'articleGroups'));
    }
}
