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

    private function userCheck()
    {
        if(Auth::user()->role!=2)
        {
            return redirect('/')->with('error','You are not listed as ADMIN');
        }
    }
    
    public function homeAdmin()
    {
        //user check
        $this->userCheck();
        
        $pendingCount = Question::where('status',0)->count();
        $approveCount = Question::where('status',1)->count();
        $rejectedCount = Question::where('status',2)->count();
        $totalCount = Question::all()->count();
        return view('admin.homeAdmin',compact('pendingCount','approveCount','rejectedCount','totalCount'));
    }

    public function listQuestions($status)
    {
        $this->userCheck();

        if($status!="all")
        {
            $questions = Question::where('status',$status)->get(['id','varsity']);
            $varsities = config('constants.varsities');
            
            if($status=='0')
            {
                return view('admin.pendingQsionAdmin',compact('questions' ,'varsities'));
            }
            elseif($status=='1')
            {
                return view('admin.approvedQsionAdmin',compact('questions' ,'varsities'));
            }
            elseif(($status=='2')) {
                return view('admin.rejectedQsionAdmin',compact('questions' ,'varsities'));
            }
            else {
                return view('notFound');
            }
        }else if($status=='all'){
            $questions = Question::all('id','varsity');
            $varsities = config('constants.varsities');

            return view('admin.rejectedQsionAdmin',compact('questions' ,'varsities'));
        }
        else {
            return view('notFound');
        }
        

        
    }

    public function detailQuestion($id)
    {
        $question =  Question::find($id);
        $varsities = config('constants.varsities');
        $departments =config('constants.departments');

        $varsity = $varsities[$question->varsity];
        $department = $departments[$question->department];

        return view('admin.detailQsionAdmin',compact('varsity','department','question'));
    }

    public function changeStatus(Request $request)
    {
        //user check
        $this->userCheck();

        $question = Question::find($request->input('id'));

        $question->status = $request->input('status');
        $question->comment = $request->input('comment');
        $question->save();

        return redirect('/admin');
    }
}
