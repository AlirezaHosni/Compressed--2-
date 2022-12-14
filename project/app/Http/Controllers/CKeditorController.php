<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKeditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('ckeditor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
            $file=$request->file('upload');
            if (empty($file)){
                dd('jasdfg');
            }else{
                $image=$file->getClientOriginalName();
                $path="upload/article/".$image ;
                if (file_exists($path)){
                    $image=bin2hex(random_bytes(5)).$image ;
                }
                $file->move("upload/article/",$image);

                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset("upload/article/" . $image);
                $msg = "image uploaded successfully";
                $response = "<script>window.parent.CKEDITOR.tools.callFunction('$CKEditorFuncNum', '$url', '$msg')</script>";

                @header('Content-type: text/html; charset-utf-8');
                echo $response;
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
