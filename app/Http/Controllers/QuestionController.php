<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Question;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>'detailQuestion']);
    }

    public function showQustionForm()
    {
        $varsities = config('constants.varsities');
        $departments = config('constants.departments');
        return view('question.addQuestion' , compact('varsities','departments'));
    }

    public function addQuestion(Request $request)
    {
        $this->validate($request,[
            'varsity'       => 'required',
            'semester'      => 'required',
            'year'          => 'required',
            'department'    => 'required',
            'subject'       => 'required',
            'batch'         => 'required',
            'page1'         => 'required|image|max:1024',
            'page2'         => 'image|max:1024',
            'page3'         => 'image|max:1024'
        ],
        [
            'page1.required' => 'Question Page1 is required'
        ]
        );

        //handle upload image
        if($request->hasFile('page1')){

            $ext = $request->file('page1')->getClientOriginalExtension();
            $page1 = 'q1'.time().'.'.$ext; 
        }else {
            return redirect()->back()->with('error','Question Page1 is required');
        }

        if($request->hasFile('page2')){

            $ext = $request->file('page2')->getClientOriginalExtension();
            $page2 = 'q2'.time().'.'.$ext; 
        }else {
            // return redirect()->back()->with('error','Question Page2 is required')->withInput($request->input());
            $page2=null;
        }

        if($request->hasFile('page3')){

            $ext = $request->file('page3')->getClientOriginalExtension();
            $page3 = 'q3'.time().'.'.$ext; 
        }else {
            $page3=null;
        }

        //save to the db
        $question = new Question();
        $question->varsity = $request->input('varsity');
        $question->semester = $request->input('semester');
        $question->year = $request->input('year');
        $question->department = $request->input('department');
        $question->subject = $request->input('subject');
        $question->batch = $request->input('batch');
        $question->page1 = $page1;
        $question->page2 = $page2;
        $question->page3 = $page3;
        $question->user_id = auth()->user()->id;
        $question->save();
        
        $request->file('page1')->storeAs('public/QPics',$page1);
        
        if($page2!=null)
            $request->file('page2')->storeAs('public/QPics',$page2);
        
        if($page3!=null)
            $request->file('page3')->storeAs('public/QPics',$page3);
        
        return redirect('/user')->with('success','Question is added.');
    }

    public function detailQuestion($id)
    {
        
        if(Auth::check())
        {
            $question = Question::where('id',$id)->first();
        }else {
            $question = Question::where([
                ['id', '=', $id],
                ['status', '=', '1'],
            ])->first();   
        }

        if($question ==null)
            return view('notFound');
        
        $varsities = config('constants.varsities');
        $departments = config('constants.departments');

        $varsity = $varsities[$question->varsity];
        $department = $departments[$question->department];

        return view('question.detailQuestion',compact('varsity','department','question'));
    }

   
}
