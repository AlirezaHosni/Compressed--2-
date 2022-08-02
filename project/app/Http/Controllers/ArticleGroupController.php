<?php

namespace App\Http\Controllers;

use App\ArticleGroup;
use App\Menu;
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
        $menu=Menu::all();
        return view('backEnd.articleGroup.create')->with(compact('menu'));
    }

    public function store(Request $request)
    {

        $articleGroup=new ArticleGroup();
        $articleGroup->title=$request->title;
        $articleGroup->url=$request->url;
        $articleGroup->menu_id=$request->menu_id ;
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
        $menu=Menu::all();
        $data=ArticleGroup::findOrFail($articleGroup);
        return view('backEnd.articleGroup.edit')->with(compact('data','menu'));
    }

    public function update(Request $request,$articleGroup)
    {

       $data=ArticleGroup::findOrFail($articleGroup);
       $data->title=$request->title;
       $data->url=$request->url;
       $data->menu_id=$request->menu_id;
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
