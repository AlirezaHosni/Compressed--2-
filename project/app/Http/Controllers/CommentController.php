<?php

namespace App\Http\Controllers;

use App\Analysis;
use App\AnswerComment;
use App\Comment;
use App\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $comments=Comment::orderBy('id', 'desc')->paginate(15);
        return view('backEnd.comment.index')->with(compact('comments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data=new AnswerComment();
        $data->comment_id=$request->comment_id;
        $data->answer=$request->answer;
        $data->save();
        return redirect()->route('comment.index');
    }

    public function storeComment(Request $request, $id, $type)
    {

        $data=new Comment();
        $data->fullName=$request->fullName;
        $data->email=$request->email;
        $data->comment=$request->Text;
        $data->commentable_id=$id;
        if ($type == 0) {
            $data->commentable_type = Article::class;
            $data->save();
            $article = Article::find(id);
            return redirect()->route('singleArticle', $article->url);

        }
        elseif ($type == 1){
            $data->commentable_type=Analysis::class;
            $data->save();
            return redirect()->route('alltahlil.show', $id);
        }
    }

    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request,$comment)
    {
        dd($comment);
    }


    public function destroy($comment)
    {
        $comment=Comment::findOrFail($comment);
        Comment::destroy($comment->id);
        return  redirect()->back();
    }
    public function answerComment($id){
        $comment=Comment::findOrFAil($id);
        return view('backEnd.comment.answerComment')->with(compact('comment'));
    }
    public function activeComment(Request $request,$id)
    {

        $data = Comment::findOrFail($id);
        if ($data->active == 0){
            $data->active= 1 ;
        }else{
            $data->active = 0 ;
        }
        $data->save();
        return redirect()->back();

    }
}
