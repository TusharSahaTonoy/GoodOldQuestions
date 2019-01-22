<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
class HomeController extends Controller
{
    public function home()
    {
        $questions =Question::where('status',1)->get(['id','varsity','created_at']); 

        $varsities = config('constants.varsities');
        $departments = config('constants.departments');

        
        return view('home' , compact('varsities','departments','questions'));
    }
    public function searchQuestion(Request $request)
    {
        $varsities = config('constants.varsities');
        $departments = config('constants.departments');
        $columns =[
            ['status',1]
        ];

        if($request->input('varsity')!=null)
        {
            $varsity=$request->input('varsity');
            $columns[] = ['varsity',$varsity];
        }
        if($request->input('semester')!=null)
        {
            $semester=$request->input('semester');
            $columns[] = ['semester',$semester];
        }
        if($request->input('year')!=null)
        {
            $year=$request->input('year');
            $columns[] = ['year',$year];
        }
        if($request->input('department')!=null)
        {
            $department=$request->input('department');
            $columns[] = ['department',$department];
        }
        $questions =Question::where($columns)->get(['id','varsity','created_at']);     

        return view('home',compact('varsities','departments','questions'));
    }
}
