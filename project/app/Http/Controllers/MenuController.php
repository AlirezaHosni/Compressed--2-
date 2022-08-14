<?php

namespace App\Http\Controllers;

use App\ArticleGroup;
use App\Menu;
use App\SubMenu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $submenu=SubMenu::all();
        $menus=Menu::all();
        return view('backEnd.menus.index')->with(compact('submenu','menus'));
    }

    public function create()
    {
        $menu=Menu::where('parent_id','=',null)->get();
        if (!empty($menu)){
            return view('backEnd.menus.create')->with(compact('menu'));
        }else{
            return view('backEnd.menus.create');
        }

    }

    public function store(Request $request)
    {
        $menu=new Menu();
        $file=$request->file('image');
        if (!empty($file)){
            $image=$file->getClientOriginalName();
            $path="upload/menu/".$image ;
            if (file_exists($path)){
                $image=bin2hex(random_bytes(5)).$image;
            }
            $file->move("upload/menu/",$image);
            $menu->image=$image;
        }

        $menu->title=$request->title;
        $menu->url=$request->url;
        $menu->priority=$request->priority;
        $menu->imageAlt=$request->imageAlt;
        $menu->symbol=$request->symbol;
        $menu->subMenu_id=$request->subMenu_id;
        if ($request->parent_id === null){
            $menu->parent_id=null;
        }else{
            $menu->parent_id=$request->parent_id ;
        }
        $menu->save();

        $articleGroup=new ArticleGroup();
        $articleGroup->title=$request->title;
        $articleGroup->url=$request->url;
        if ($menu->parent_id){
            $articleGroupParentId = ArticleGroup::where('title', 'like', "%$menu->parent_id%")->first()->id;
            $articleGroup->parent_id = $articleGroupParentId;
        }
        $shortNews=$request->shortNews;
        if (!empty($shortNews)){
            $articleGroup->shortNews=$shortNews;
        }
        $articleGroup->save();
        return redirect()->route('menus.index');
    }

    public function edit($menu)
    {
        $menu=Menu::findOrFail($menu);
        $menuOption=Menu::where('parent_id','=',null)->get();
        if (!empty($menuOption)){
            return view('backEnd.menus.edit')->with(compact('menu','menuOption'));
        }else{
            return view('backEnd.menus.edit')->with(compact('menu'));
        }

    }

    public function update(Request $request,$menu)
    {
        $menu=Menu::findOrFail($menu);
        $file=$request->file('image');
        if (empty($file)){
            $image=$menu->image;
            $menu->image=$image ;
        }else{
            $imageOld=$menu->image;
            if (!empty($imageOld)){
                $pathOld="upload/menu/".$imageOld;
                unlink($pathOld);
            }
            $image=$file->getClientOriginalName();
            $path="upload/menu/".$image ;
            if (file_exists($path)){
                $image=bin2hex(random_bytes(5)).$image ;
            }
            $file->move("upload/menu/",$image);
            $menu->image=$image ;
        }
        $menu->title=$request->title;
        $menu->url=$request->url;
        $menu->priority=$request->priority;
        $menu->imageAlt=$request->imageAlt;
        if ($request->parent_id === null){
            $menu->parent_id=null;
        }else{
            $menu->parent_id=$request->parent_id ;
        }
        $menu->symbol=$request->symbol;
        $menu->save();

        $articleGroup=ArticleGroup::where('title', 'like', "%$menu->title%")->first();
        $articleGroup->title=$request->title;
        $articleGroup->url=$request->url;
        if ($menu->parent_id){
            $articleGroupParentId = ArticleGroup::where('title', 'like', "%$menu->parent_id%")->first()->id;
            $articleGroup->parent_id = $articleGroupParentId;
        }
        $shortNews=$request->shortNews;
        if (!empty($shortNews)){
            $articleGroup->shortNews=$shortNews;
        }
        $articleGroup->save();

        return redirect()->route('menus.index');

    }

    public function destroy($menu)
    {
        $menu=Menu::findOrFail($menu);
        $image=$menu->image;
        if (!empty($image)){
            $path="upload/menu/".$image;
            unlink($path);
        }
        Menu::destroy($menu->id);
        $articleGroup=ArticleGroup::where('title', 'like', "%$menu->title%")->first();
        $articleGroup->delete();

        return redirect()->route('menus.index');
    }
    public function createMenu($id){
        $submenu=$id ;
        $menu=Menu::where('parent_id','=',null)->get();
        if (!empty($menu)){
            return view('backEnd.menus.create')->with(compact('menu','submenu'));
        }else{
            return view('backEnd.menus.create')->with(compact('submenu'));
        }
    }
}
