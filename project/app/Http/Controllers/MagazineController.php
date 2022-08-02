<?php

namespace App\Http\Controllers;

use App\Magazine;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    public function index()
    {
        $magazines=Magazine::all();
        return view('backEnd.magazine.index')->with(compact('magazines'));
    }


    public function create()
    {
        return view('backEnd.magazine.create');
    }


    public function store(Request $request)
    {

        $contentTitle=implode(',',$request->contentTitle);
       $magazine=new Magazine();
       $file=$request->file('imageFile');
       $imageFile=$file->getClientOriginalName();
       $pathImage="upload/magazine/imageFile/".$imageFile ;
       if (file_exists($pathImage)){
           $imageFile=bin2hex(random_bytes(5)).$imageFile;
       }
       $file->move("upload/magazine/imageFile/",$imageFile);
       $magazine->imageFile=$imageFile;



        $document=$request->file('file');
        $documentFile=$document->getClientOriginalName();
        $path="upload/magazine/file/".$documentFile ;
        if (file_exists($path)){
            $documentFile=bin2hex(random_bytes(5)).$documentFile;
        }
        $document->move("upload/magazine/file/",$documentFile);
        $magazine->file=$documentFile;
        $magazine->title=$request->title;
        $magazine->contentTitle=$contentTitle;
        $magazine->publishDate=$request->publishDate;
        $magazine->save();
        return redirect()->route('magazine.index');

    }


    public function show(Magazine $magazine)
    {
        //
    }
    
    public function showMagazines()
    {
        $magazines = Magazine::orderBy('publishDate', 'desc')->get();
        return view('frontEnd.magazine.index', compact('magazines'));
    }
        
    public function downloadMagazine(Magazine $magazine)
    {
        return "downloading magazine with title : $magazine->title";
    }


    public function edit($magazine)
    {
         $magazine=Magazine::findOrFail($magazine);
         return view('backEnd.magazine.edit')->with(compact('magazine'));
    }

    public function update(Request $request,$magazine)
    {
        $contentTitle=implode(',',$request->contentTitle);
        $magazine=Magazine::findOrFail($magazine);
        $file=$request->file('imageFile');
        if (empty($file)){
            $imageFile=$magazine->imageFile;
            $magazine->imageFile=$imageFile;
        }else{
            $imageFileOld=$magazine->imageFile;
            if (!empty($imageFileOld)) {
                $pathOld = "upload/magazine/imageFile/" . $imageFileOld;
                unlink($pathOld);
            }
            $imageFile=$file->getClientOriginalName();
            $path="upload/magazine/imageFile/".$imageFile;
            if (file_exists($path)){
                $imageFile=bin2hex(random_bytes(5)).$imageFile;
            }
            $file->move("upload/magazine/imageFile/",$imageFile);
            $magazine->imageFile=$imageFile;

        }

        $document=$request->file('file');
        if (empty($document)){
            $file=$magazine->file;
            $magazine->file=$file;
        }else{
            $fileOld=$magazine->file;
            if (!empty($fileOld)) {
                $pathOld = "upload/magazine/file/".$fileOld;
                unlink($pathOld);
            }
            $documentFile=$document->getClientOriginalName();
            $pathDocument="upload/magazine/file/".$documentFile;
            if (file_exists($pathDocument)){
                $documentFile=bin2hex(random_bytes(5)).$documentFile;
            }
            $document->move("upload/magazine/file/",$documentFile);
            $magazine->file=$documentFile;
        }
        $magazine->title=$request->title;
        $magazine->publishDate=$request->publishDate;
        $magazine->contentTitle=$contentTitle;
        $magazine->save();
        session()->flash('update','ویرایش مجله شما با موفقیت انجام شد ');
        return redirect()->route('magazine.index');

    }

    public function destroy($magazine)
    {
        $magazine=Magazine::findOrFail($magazine);
        $image=$magazine->imageFile;
        if (!empty($image)){
            $pathImage="upload/magazine/imageFile/".$image ;
            unlink($pathImage);
        }
        $document=$magazine->file;
        if (!empty($document)){
            $path="upload/magazine/file/".$document ;
            unlink($path);
        }
        Magazine::destroy($magazine->id);
        session()->flash('delete','مجله مورد نظر با موفقیت حذف شد');
        return redirect()->back();

    }
}
