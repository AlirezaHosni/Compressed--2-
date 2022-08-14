<?php

namespace App\Http\Controllers\front;

use App\Analysis;
use App\Article;
use App\Menu;
use App\ArticleGroup;
use App\User;
use App\Http\Controllers\Controller;

class ArticleMenuController extends Controller
{
    public function index()
    {
        $path = \request()->path();
        $path = '/' . $path;
        $menu = Menu::where('url', 'like', "%$path%")->first();
        $articleGroup = ArticleGroup::where('title', 'like', "%$menu->title%")->first();
        $articleGroupChildren = ArticleGroup::allchildren($articleGroup, [$articleGroup]);
        $ids = [];
        foreach ($articleGroupChildren as $articleGroupChild){
            $ids[] = $articleGroupChild['id'];
        }
        $articles = Article::whereIn('article_group_id', $ids)->orderBy('publishDate', 'desc')->simplePaginate(10);

        $title = $articleGroup->title;
        return view('frontEnd.archive.index', compact('articles', 'title'));
    }

    public function latest()
    {
        $articles = Article::orderBy('publishDate', 'desc')->limit(22)->get();

        $title = 'جدیدترین‌ها';

        return view('frontEnd.archive.index', compact('articles', 'title'));
    }

    public function allTahlil()
    {
        $authors = User::permission('تحلیلگر')->limit(5)->get();
        $analysis = Analysis::paginate(7);
        return view('frontEnd.analysis.index', compact('authors', 'analysis'));
    }

    public function allTahlilShow(Analysis $analysis)
    {
        $analysis->visit_number = $analysis->visit_number + 1;
        $analysis->save();
        $comments = $analysis->comments->where('active', 1);

        return view('frontEnd.analysis.show', compact('analysis', 'comments'));
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
