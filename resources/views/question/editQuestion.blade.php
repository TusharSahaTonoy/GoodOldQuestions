@extends('layouts.app')

@section('content')
    <div>
        <h1>Question Details</h1>
    </div>
    <div class="jumbotron-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                {!! Form::open(['action'=>['QuestionController@addQuestion',$question->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
            
                {{-- varsity --}}
                <div class="form-group row">
                    {{ Form::label('versity','University Name :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                    
                    {{ Form::text('varsity',$question->varsity,['class'=>'col-md-9 form-control','placeholder'=>'Enter University Name','readonly'])}}
                </div>
                {{-- Semester --}}
                <div class="form-group row">
                    {{ Form::label('semester','Select Semester :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                    
                    {{ Form::select('semester',['sp'=>'Spring','sm'=>'Summer','fa'=>'Fall'],$question->semester,['class'=>'col-md-2']) }}
                    &nbsp;&nbsp;
                    {{ Form::label('versity','Year:',['class'=>'col-form-label '])}}
                    {!! Form::selectRange('year', 2010, 2019,$question->year) !!}
                </div>

                <div class="form-group row">
                    {{ Form::label('department','Department :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                    
                    {{ Form::select('department',
                    [
                        'swe'=>'Software Engineering (SWE)',
                        'cse'=>'Computer Science And Engineering (CSE)',
                        'eee'=>'Electrical And Electronics Engineering (EEE)',
                        'bba'=>'Bachelor of Business Administration (BBA)'

                    ],$question->department,['class'=>'col-md-4']) }}

                </div>

                <div class="form-group row justify-content-center">
                    <img src="{{asset('/storage/QPics/'.$question->page1)}}" alt="Page1">
                </div>

                @if($question->page2!=null)
                <div class="form-group row justify-content-center">
                    <img src="{{asset('/storage/QPics/'.$question->page2)}}" alt="Page2">
                </div>
                @endif
                
                @if($question->page3!=null)
                <div class="form-group row justify-content-center">
                    <img src="{{asset('/storage/QPics/'.$question->page3)}}" alt="Page3">
                </div>
                @endif

                <div class="form-group row">
                    <button type="submit" class="col-md-2 ">Submit</button>
                </div>
            
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection