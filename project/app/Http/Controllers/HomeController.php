<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $user=auth()->user();
        if ($user->hasRole('ادمین')){
            return view('backEnd.home')->with(compact('user'));
        }elseif($user->hasRole('نویسنده')){
            return redirect()->route('article.index');
        }else{
            if($user->can('تحلیلگر')){
                return redirect()->route('analysis.index');
            }
            return redirect()->route('index');
        }

    }
}
