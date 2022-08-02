<?php

namespace App\Http\Controllers;

use App\Advertise;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{

    public function index()
    {
        $advertise=Advertise::all();
       return view('backEnd.advertise.index')->with(compact('advertise'));
    }


    public function create()
    {
        return view('backEnd.advertise.create');
    }


    public function store(Request $request)
    {
       $data=new Advertise();
       $data->title=$request->title;
       $data->systemName=$request->systemName;
       $data->advertiseTitle=$request->advertiseTitle;
       $data->imageAlt=$request->imageAlt;
       $data->url=$request->url;
       if (!empty($request->isBlank)){
           $data->isBlank=$request->isBlank;
       }
        if (!empty($request->isFollow)){
            $data->isFollow=$request->isFollow;
        }
        $file=$request->file('image');
        $imageName=$file->getClientOriginalName();
        $path="upload/advertise/".$imageName ;
        if (file_exists($path)){
            $imageName = bin2hex(random_bytes(5)).$imageName ;
        }
        $file->move("upload/advertise/",$imageName);
        $data->image=$imageName;
        $data->save();
        return redirect()->route('advertise.index');

    }

    public function show(Advertise $advertise)
    {
        //
    }

    public function edit($advertise)
    {
       $advertise=Advertise::findOrFail($advertise);
       return view('backEnd.advertise.edit')->with(compact('advertise'));
    }

    public function update(Request $request,$advertise)
    {
        $advertise=Advertise::findOrFail($advertise);
        $file=$request->file('image');
        if (empty($file)){
            $image=$advertise->image;
            $advertise->image=$image;
        }else{
            $imageOld=$advertise->image ;
            $pathOld="upload/advertise/".$imageOld ;
            if (file_exists($pathOld)){
                unlink($pathOld);
            }
            $imageName=$file->getClientOriginalName();
            $path="upload/advertise/".$imageName;
            if(file_exists($path)){
                $imageName = bin2hex(random_bytes(5)).$imageName ;
            }
            $file->move("upload/advertise/",$imageName);
            $advertise->image=$imageName;
        }
        $advertise->title=$request->title;
        $advertise->systemName=$request->systemName;
        $advertise->advertiseTitle=$request->advertiseTitle;
        $advertise->imageAlt=$request->imageAlt;
        $advertise->url=$request->url;
        if (!empty($request->isBlank)){
            $advertise->isBlank=$request->isBlank;
        }
        if (!empty($request->isFollow)){
            $advertise->isFollow=$request->isFollow;
        }
        $advertise->save();
        return redirect()->route('advertise.index');

    }

    public function destroy(Advertise $advertise)
    {
        //
    }
}
