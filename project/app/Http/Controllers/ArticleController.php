<?php

namespace App\Http\Controllers;

use App\Article;
use App\Menu;
use App\ArticleGroup;
use App\Advertise;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Telegram\Bot\Laravel\Facades\Telegram;
/*use NotificationChannels\Telegram\Telegram;*/
use NotificationChannels\Telegram\TelegramUpdates;
use App\Notifications;
use Illuminate\Notifications\Notifiable;

class ArticleController extends Controller
{

    public function index()
    {
        $article=Article::paginate(10);
        if(auth()->user()->hasRole('نویسنده')){
            $article = $article->where('user_id', auth()->user()->id);
        }
        return view('backEnd.article.index')->with(compact('article'));
    }

    public function listArticles()
    {
        // to do
    }

    public function latestArticle($article)
    {
        $article = Article::where('id', '<', $article)->get()->last();
        $data = $article->toArray();
        $data['publishDateAgo'] = jalaliAgo($article->publishDate);
        return response()->json($data);
    }

    public function create()
    {
        $articleGroup=ArticleGroup::all();
        $tags=Tag::all();
        $users=User::all();
        return view('backEnd.article.create')->with(compact('articleGroup','tags','users'));
    }


    public function store(Request $request)
    {

       $article=new Article();
        $mainContent=strip_tags($request->mainContent);
        $summary=strip_tags($request->summary);
        if($request->tag)
            $tag=implode(',',$request->tag);
        else
            $tag = '';
       $file=$request->file('image');
       $image=$file->getClientOriginalName();
       $path="upload/article/".$image;
       if (file_exists($path)){
           $image=bin2hex(random_bytes(5)).$image ;
       }
       $file->move("upload/article/",$image);
       $article->image=$image;
       if($request->tag)
        $tag=implode(',',$request->tag);
       else
           $tag = '';
       $article->title=$request->title;
       if (!empty($request->shortNews)){
           $article->shortNews=$request->shortNews;
       }
       $article->titleTwo=$request->titleTwo;
//       $article->publishDAte=$request->publishDate;
       $realTimestampStart = substr($request->publishDate, 0, 10);
       $article->publishDate = date("Y-m-d H:i:s", (int)$realTimestampStart);
       $article->imageAlt=$request->imageAlt;
       $article->url=$request->url;
       $article->source=$request->source;
       $article->metaDescription=$request->metaDescription;
       $article->metaKeyWords=$request->metaKeyWords;
       if(auth()->user()->hasRole('نویسنده'))
            $article->user_id=auth()->user()->id;
        else
            $article->user_id=$request->user_id;
       $article->tag=$tag;
       $article->article_Group_id=$request->article_Group_id;
       $article->mainContent=$mainContent;
       $article->summary=$summary;
       $article->save();
       return redirect()->route('article.index');

    }

    public function singleArticle( $article )
    {
        $article = Article::where('url', $article)->first();
        $article->visit_number = $article->visit_number + 1;
        $article->save();
        $data=ArticleGroup::where('id','=',$article->article_Group_id)->get();
        $comments = $article->comments->where('active', 1);
        return view('frontEnd.single', compact('data', 'article', 'comments'));
    }

    public function show( $article )
    {
        $article=Article::findOrFail($article);
        $data=ArticleGroup::where('id','=',$article->article_Group_id)->get();
        return view('backEnd.article.show')->with(compact('article','data'));
    }

    public function edit($article)
    {
        $articleGroup=ArticleGroup::all();
        $tags=Tag::all();
        $users=User::all();
        $article=Article::findOrFail($article);
        return view('backEnd.article.edit')->with(compact('article','articleGroup','tags','users'));
    }

    public function update(Request $request,$article)
    {
        $article=Article::findOrFail($article);
        $mainContent=strip_tags($request->mainContent);
        $summary=strip_tags($request->summary);
//        if($request->tag)
//            $tag=implode(',',$request->tag);
//        else
//            $tag = '';
        $file=$request->file('image');
        if (empty($file)){
            $image=$article->image;
            $article->image=$image;
        }else{
            $oldImage=$article->image;
            if (!empty($oldImage)){
                $oldpath="upload/article/".$oldImage;
                unlink($oldpath);
                $image=$file->getClientOriginalName();
                $path='upload/article/'.$image;
                if (file_exists($path)){
                    $image=bin2hex(random_bytes(5)).$image ;
                }
                $file->move("upload/article/",$image);
                $article->image=$image;
            }
        }

        $article->title=$request->title;
        if (!empty($request->shortNews)){
            $article->shortNews=$request->shortNews;
        }
        $article->titleTwo=$request->titleTwo;
//        $article->publishDAte=$request->publishDate;
        $realTimestampStart = substr($request->publishDate, 0, 10);
        $article->publishDate = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $article->imageAlt=$request->imageAlt;
        $article->url=$request->url;
        $article->source=$request->source;
        $article->metaDescription=$request->metaDescription;
        $article->metaKeyWords=$request->metaKeyWords;
        if(auth()->user()->hasRole('نویسنده'))
            $article->user_id=auth()->user()->id;
        else
            $article->user_id=$request->user_id;
        $article->tag= ltrim($request->tag, ',');
        $article->article_Group_id=$request->article_Group_id;
        $article->mainContent=$mainContent;
        $article->summary=$summary;
        $article->save();
        return redirect()->route('article.index');
    }

    public function destroy($article)
    {
       $article=Article::findOrFail($article);
       Article::destroy($article->id);
       return redirect()->route('article.index');

    }
    public function trashArticle(){
        $article=Article::onlyTrashed()->paginate(10);
        if(auth()->user()->hasRole('نویسنده')){
            $article = $article->where('user_id', auth()->user()->id);
        }
        return view('backEnd.article.trash')->with(compact('article'));
    }
    public function trashDestroy($id){
        $article=Article::findOrFail($id);
        $image=$article->image;
        if (!empty($image)){
            $path="upload/article/".$image;
            unlink($path);
        }

        Article::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('Trash.Article');
    }
    public function trashRestore($id){
        Article::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('Trash.Article');
    }

    public function Details($url){
        $articles=Article::where('url',$url)->get();
        foreach ($articles as $article){
            $data=ArticleGroup::where('id','=',$article->article_Group_id)->get();
            return view('backEnd.article.show')->with(compact('article','data'));
        }
    }

    public function Telegram($id){
        $article=Article::findOrFail($id);
       /* $telegram_id=Config::get('services.telegram_id');*/
//        $article=Article::find(2);
        $article->notify(new \App\Notifications\ArticlePublished());
        return redirect()->back();
    }

    public function changeActiveStatus(Article $article)
    {
        if ($article->active == 0)
            $article->active = 1;
        elseif ($article->active == 1)
            $article->active = 0;
        $article->save();

        return redirect()->route('article.index');
    }
}
