<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Question;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function homeAdmin()
    {
        //user check
        if(Auth::user()->role!=2)
        {
            return redirect('/')->with('error','You are not listed as ADMIN');
        }
        
        $count = Question::where('status','=','0')->count();
        
        return view('admin.homeAdmin',compact('count'));
    }
    
    public function pendingQuestions()
    {
        //user check
        if(Auth::user()->role!=2)
        {
            return redirect('/')->with('error','You are not listed as ADMIN');
        }

        $questions = Question::where('status','=','0')->get();

        return view('admin.pendingQsionAdmin',compact('questions'));
    }

    public function detailQuestion($id)
    {
        $question =  Question::find($id);
        return view('admin.detailQsionAdmin',compact('question'));
    }

    public function changeStatus(Request $request)
    {
        //user check
        if(Auth::user()->role!=2)
        {
            return redirect('/')->with('error','You are not listed as ADMIN');
        }

        $question = Question::find($request->input('id'));

        $question->status = $request->input('status');
        $question->save();

        return redirect('/admin/pendingQuestions');
    }
}
