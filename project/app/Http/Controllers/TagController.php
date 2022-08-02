<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags=Tag::all();
        return view('backEnd.tags.index')->with(compact('tags'));
    }

    public function create()
    {
        return view('backEnd.tags.create');
    }

    public function store(Request $request)
    {
       $tag=new Tag();
        $topDescription=strip_tags($request->topDescription);
        $bottomDescription=strip_tags($request->bottomDescription);
        $tag->title=$request->title;
        $tag->url=$request->url;
        $tag->topDescription=$topDescription;
        $tag->bottomDescription=$bottomDescription;
        $tag->save();
        return redirect()->route('tags.index');
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit($tag)
    {
        $tag=Tag::findOrFail($tag);
        return view('backEnd.tags.edit')->with(compact('tag'));
    }

    public function update(Request $request,$tag)
    {
        $tag=Tag::findOrFail($tag);
        $topDescription=strip_tags($request->topDescription);
        $bottomDescription=strip_tags($request->bottomDescription);
        $tag->title=$request->title;
        $tag->url=$request->url;
        $tag->topDescription=$topDescription;
        $tag->bottomDescription=$bottomDescription;
        $tag->save();
        return redirect()->route('tags.index');

    }

    public function destroy($tag)
    {
        $tag=Tag::findOrFail($tag);
        Tag::destroy($tag->id);
        return redirect()->route('tags.index');
    }
}
