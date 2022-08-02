<?php

namespace App\Http\Controllers;

use App\ArticleGroup;
use App\Landing;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    public function index()
    {
        $landing=Landing::all();
        return view('backEnd.landing.index')->with(compact('landing'));
    }


    public function create()
    {
        $tags=Tag::all();
        $articleGroup=ArticleGroup::all();
        $users=User::all();
        return view('backEnd.landing.create')->with(compact('users','articleGroup','tags'));
    }


    public function store(Request $request)
    {
        $mainContent=strip_tags($request->mainContent);
        $summary=strip_tags($request->summary);
        $tag=implode(',',$request->tag);
        $landing=new Landing();
        // Start Upload Image Background //
        $imageBack=$request->file('imageBackground');
        $imageBackground=$imageBack->getClientOriginalName();
        $pathImage="upload/landing/imageBackground/".$imageBackground;
        if (file_exists($pathImage)){
            $imageBackground=bin2hex(random_bytes(5)).$imageBackground;
        }
        $imageBack->move('upload/landing/imageBackground/',$imageBackground);
        $landing->imageBackground=$imageBackground;
        // End Upload Image Background //
        // Start Upload ImageFile //
        $image=$request->file('imageFile');
        $imageFile=$image->getClientOriginalName();
        $path="upload/landing/imageFile/".$imageFile;
        if (file_exists($path)){
            $imageFile=bin2hex(random_bytes(5)).$imageFile;
        }
        $image->move("upload/landing/imageFile",$imageFile);
        $landing->imageFile=$imageFile;
        // End Upload ImageFile //
        $landing->title=$request->title;
        $landing->titleTwo=$request->titleTwo;
        $landing->publishDate=$request->publishDate;
        $landing->imageAlt=$request->imageAlt;
        $landing->url=$request->url;
        $landing->source=$request->source;
        $landing->chart=$request->chart;
        $landing->link=$request->link;
        $landing->metaKeyWords=$request->metaKeyWords;
        $landing->metaKeyDescription=$request->metaKeyDescription;
        $landing->user_id=$request->user_id;
        $landing->tag=$tag;
        $landing->ArticleGroup_id=$request->ArticleGroup_id;
        $landing->mainContent=$mainContent;
        $landing->summary=$summary;
        $landing->save();
        return redirect()->route('landing.index');


    }


    public function show($landing)
    {
        $landing=Landing::findOrFail($landing);
        $data=ArticleGroup::where('id','=',$landing->ArticleGroup_id)->get();
        return view('backEnd.landing.show')->with(compact('landing','data'));
    }

    public function edit($landing)
    {
        $users=User::all();
        $tags=Tag::all();
        $articleGroup=ArticleGroup::all();
        $landing=Landing::findOrFail($landing);
        return view('backEnd.landing.edit')->with(compact('landing','users','tags','articleGroup'));
    }

    public function update(Request $request,$landing)
    {
        $landing=Landing::findOrFail($landing);
        $mainContent=strip_tags($request->mainContent);
        $summary=strip_tags($request->summary);
        if ($request->tag !== null){
            $tag=implode(',',$request->tag);
        }

        // image Background //
        $file=$request->file('imageBackground');
        if (empty($file)){
            $imageBackGround=$landing->imageBackground;
            $landing->imageBackground=$imageBackGround;
        }else{
            $imageBackGround=$landing->imageBackground;
            if ($imageBackGround){
                $pathOld="upload/landing/imageBackground/".$imageBackGround ;
                unlink($pathOld);
            }
            $imageBack=$file->getClientOriginalName();
            $path="upload/landing/imageBackground/".$imageBack ;
            if (file_exists($path)){
                $imageBack=bin2hex(random_bytes(5)).$imageBack ;
            }
            $file->move("upload/landing/imageBackground/",$imageBack);
            $landing->imageBackground=$imageBack;
            // End image Background //

        }
        // Start imageFile //
        $document=$request->file('imageFile');
        if (empty($document)){
            $images=$landing->imageFile;
            $landing->imageFile=$images;
        }else {
            $images = $landing->imageFile;
            if ($images) {
                $pathOldImages = "upload/landing/imageFile/" . $images;
                unlink($pathOldImages);
            }
            $imageFile = $document->getClientOriginalName();
            $pathFile = "upload/landing/imageFile/" . $imageFile;
            if (file_exists($pathFile)) {
                $imageFile = bin2hex(random_bytes(5)) . $imageFile;
            }
            $document->move("upload/landing/imageFile/", $imageFile);
            $landing->imageFile = $imageFile;
            // End imageFile //
        }
        $landing->title=$request->title;
        $landing->titleTwo=$request->titleTwo;
        $landing->publishDate=$request->publishDate;
        $landing->imageAlt=$request->imageAlt;
        $landing->url=$request->url;
        $landing->source=$request->source;
        $landing->chart=$request->chart;
        $landing->link=$request->link;
        $landing->metaKeyWords=$request->metaKeyWords;
        $landing->metaKeyDescription=$request->metaKeyDescription;
        $landing->user_id=$request->user_id;
        if (!empty($tag)){
            $landing->tag=$tag;
        }
        $landing->ArticleGroup_id=$request->ArticleGroup_id;
        $landing->mainContent=$mainContent;
        $landing->summary=$summary;
        $landing->save();
        return redirect()->route('landing.index');

    }


    public function destroy($landing)
    {
        Landing::destroy($landing);
        return redirect()->route('landing.index');
    }
    public function trashLanding(){
        $landing=Landing::onlyTrashed()->get();
        return view('backEnd.Landing.trash')->with(compact('landing'));
    }
    public function destroyLanding($id){
        $landing=Landing::findOrFail($id);
        $image=$landing->imageBackground;
        if (!empty($image)){
            $pathImage="upload/landing/imageBackground/".$image;
            unlink($pathImage);
        }
        $imageFile=$landing->imageFile;
        if (!empty($imageFile)){
            $pathDocument="upload/landing/imageFile/".$imageFile;
            unlink($pathDocument);
        }
         Landing::onlyTrashed()->findOrFail($id)->forceDelete();
         return redirect()->route('trashLanding');
    }
    public function restoreLanding($id){
        Landing::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('trashLanding');

    }
}
