<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Question;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homeUser()
    {   
        $user = User::select('name','email','varsity')->where('id', auth()->user()->id)->first();
        $questions = Question::where('user_id',auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('user.homeUser',compact('user','questions'));
    }
}


