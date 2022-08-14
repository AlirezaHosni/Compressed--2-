<?php

namespace App\Http\Controllers;

use App\ArticleGroup;
use Illuminate\Http\Request;

class ArticleGroupController extends Controller
{

    public function index()
    {
        $articleGroup=ArticleGroup::all();
        return view('backEnd.articleGroup.index')->with(compact('articleGroup'));
    }

    public function create()
    {
        $articleGroups=ArticleGroup::all();
        return view('backEnd.articleGroup.create')->with(compact('articleGroups'));
    }

    public function store(Request $request)
    {
        $articleGroup=new ArticleGroup();
        $articleGroup->title=$request->title;
        $articleGroup->url=$request->url;
        $articleGroup->parent_id=$request->parent_id ;
        $shortNews=$request->shortNews;
        if (!empty($shortNews)){
            $articleGroup->shortNews=$shortNews;
        }
        $articleGroup->save();
        return redirect()->route('articleGroup.index');
    }


    public function show(ArticleGroup $articleGroup)
    {
        //
    }

    public function edit( $articleGroup )
    {
        $articleGroups = ArticleGroup::all();
        $data=ArticleGroup::findOrFail($articleGroup);
        return view('backEnd.articleGroup.edit')->with(compact('data','articleGroups'));
    }

    public function update(Request $request,$articleGroup)
    {

       $data=ArticleGroup::findOrFail($articleGroup);
       $data->title=$request->title;
       $data->url=$request->url;
       $data->parent_id=$request->parent_id;
        $shortNews=$request->shortNews;
        if (!empty($shortNews)){
            $data->shortNews=$shortNews;
        }
        $data->save();
        return redirect()->route('articleGroup.index');

    }

    public function destroy($articleGroup)
    {
        $data=ArticleGroup::findOrFail($articleGroup);
        ArticleGroup::destroy($data->id);
        return redirect()->route('articleGroup.index');
    }
}
