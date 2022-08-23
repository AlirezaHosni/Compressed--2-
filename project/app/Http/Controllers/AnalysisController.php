<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Analysis;
use App\ArticleGroup;
use App\Tag;
use App\User;

class AnalysisController extends Controller
{
    public function index()
    {
        $analysis=Analysis::all();
        if(auth()->user()->can("تحلیلگر")){
            $analysis = $analysis->where('user_id', auth()->user()->id);
        }
        return view('backEnd.analysis.index')->with(compact('analysis'));
    }


    public function create()
    {
        $articleGroup=ArticleGroup::all();
        $tags=Tag::all();
        $users=User::all();
        return view('backEnd.analysis.create')->with(compact('articleGroup','tags','users'));
    }


    public function store(Request $request)
    {

       $analysis=new Analysis();
        $mainContent=strip_tags($request->mainContent);
        $summary=strip_tags($request->summary);
        if($request->tag)
            $tag=implode(',',$request->tag);
        else
            $tag = '';
       $file=$request->file('image');
       $image=$file->getClientOriginalName();
       $path="upload/analysis/".$image;
       if (file_exists($path)){
           $image=bin2hex(random_bytes(5)).$image ;
       }
       $file->move("upload/analysis/",$image);
       $analysis->image=$image;
        if($request->tag)
            $tag=implode(',',$request->tag);
        else
            $tag = '';
       $analysis->title=$request->title;
       $analysis->titleTwo=$request->titleTwo;
//       $analysis->publishDAte=$request->publishDate;
       $realTimestampStart = substr($request->publishDate, 0, 10);
       $analysis->publishDate = date("Y-m-d H:i:s", (int)$realTimestampStart);
       $analysis->imageAlt=$request->imageAlt;
       $analysis->url=$request->url;
       $analysis->metaDescription=$request->metaDescription;
       $analysis->metaKeyWords=$request->metaKeyWords;
       if(auth()->user()->can("تحلیلگر"))
            $analysis->user_id=auth()->user()->id;
        else
            $analysis->user_id=$request->user_id;
       $analysis->tag=$tag;
       $analysis->article_Group_id=$request->article_Group_id;
       $analysis->mainContent=$mainContent;
       $analysis->summary=$summary;
       $analysis->save();
       return redirect()->route('analysis.index');

    }

    public function show( $analysis )
    {
        $analysis=Analysis::findOrFail($analysis);
        $data=ArticleGroup::where('id','=',$analysis->article_Group_id)->get();
        return view('backEnd.analysis.show')->with(compact('analysis','data'));
    }

    public function singleAnalysis( $analysis )
    {
        $advertise = Advertise::first();

        $papularArticles = Analysis::limit(8)->get();
        $analysis=Analysis::where('url', $analysis)->first();
        $data=ArticleGroup::where('id','=',$analysis->article_Group_id)->get();
//        $comments = $analysis->comments->where('active', 1);
        return view('frontEnd.single', compact('data', 'analysis', 'papularArticles', 'advertise'));
    }

    public function edit($analysis)
    {
        $articleGroup=ArticleGroup::all();
        $tags=Tag::all();
        $users=User::all();
        $analysis=Analysis::findOrFail($analysis);
        return view('backEnd.analysis.edit')->with(compact('analysis','articleGroup','tags','users'));
    }

    public function update(Request $request,$analysis)
    {
        $analysis=Analysis::findOrFail($analysis);
        $mainContent=strip_tags($request->mainContent);
        $summary=strip_tags($request->summary);
        if($request->tag)
            $tag=implode(',',$request->tag);
        else
            $tag = '';
        $file=$request->file('image');
        if (empty($file)){
            $image=$analysis->image;
            $analysis->image=$image;
        }else{
            $oldImage=$analysis->image;
            if (!empty($oldImage)){
                $oldpath="upload/analysis/".$oldImage;
                unlink($oldpath);
                $image=$file->getClientOriginalName();
                $path='upload/analysis/'.$image;
                if (file_exists($path)){
                    $image=bin2hex(random_bytes(5)).$image ;
                }
                $file->move("upload/analysis/",$image);
                $analysis->image=$image;
            }
        }

        $analysis->title=$request->title;
        $analysis->titleTwo=$request->titleTwo;
//        $analysis->publishDAte=$request->publishDate;
        $realTimestampStart = substr($request->publishDate, 0, 10);
        $analysis->publishDate = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $analysis->imageAlt=$request->imageAlt;
        $analysis->url=$request->url;
        $analysis->metaDescription=$request->metaDescription;
        $analysis->metaKeyWords=$request->metaKeyWords;
        if(auth()->user()->can("تحلیلگر"))
            $analysis->user_id=auth()->user()->id;
        else
            $analysis->user_id=$request->user_id;
        $analysis->tag=$tag;
        $analysis->article_Group_id=$request->article_Group_id;
        $analysis->mainContent=$mainContent;
        $analysis->summary=$summary;
        $analysis->save();
        return redirect()->route('analysis.index');
    }

    public function destroy($analysis)
    {
       $analysis=Analysis::findOrFail($analysis);
        Analysis::destroy($analysis->id);
       return redirect()->route('analysis.index');

    }

    public function trashAnalysis(){
        $analysis=Analysis::onlyTrashed()->get();
        if(auth()->user()->can("تحلیلگر")){
            $analysis = $analysis->where('user_id', auth()->user()->id);
        }
        return view('backEnd.analysis.trash')->with(compact('analysis'));
    }

    public function trashDestroy($id){
        $analysis=Analysis::findOrFail($id);
        $image=$analysis->image;
        if (!empty($image)){
            $path="upload/analysis/".$image;
            unlink($path);
        }

        Analysis::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('Trash.Analysis');
    }

    public function trashRestore($id){
        Analysis::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('Trash.Analysis');
    }

    public function Details($url){
        $analysiss=Analysis::where('url',$url)->get();
        foreach ($analysiss as $analysis){
            $data=ArticleGroup::where('id','=',$analysis->article_Group_id)->get();
            return view('backEnd.analysis.show')->with(compact('analysis','data'));
        }
    }

    public function Telegram($id){
//        $analysis=Analysis::findOrFail($id);
//       /* $telegram_id=Config::get('services.telegram_id');*/
//        $analysis=Analysis::find(2);
//        $analysis->notify(new \App\Notifications\AnalysisPublished());
        return redirect()->back();
    }
}
