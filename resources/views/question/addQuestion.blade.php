@extends('layouts.app')

@section('content')
    <div class="Jumbotron-fluid justify-content-center" >
        <div>
            <h2>Add A Question</h2>
        </div>
        
        {!! Form::open(['action'=>'QuestionController@addQuestion','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            
            {{-- varsity --}}
            <div class="form-group row">
                {{ Form::label('versity','University Name :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                
                {{ Form::select('varsity',$varsities,'diu',['class'=>'col-md-7']) }}
            </div>
            {{-- Semester --}}
            <div class="form-group row">
                {{ Form::label('semester','Select Semester :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                
                {{ Form::select('semester',[
                    'sp'=>'Spring',
                    'sm'=>'Summer',
                    'fa'=>'Fall'
                    ],'sp',['class'=>'col-md-2']) }}
                &nbsp;&nbsp;
                {{ Form::label('versity','Year:',['class'=>'col-form-label '])}}
                {!! Form::selectRange('year', 2010, 2019) !!}
            </div>

            <div class="form-group row">
                {{ Form::label('department','Department :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                
                {{ Form::select('department',$departments,'swe',['class'=>'col-md-7']) }}

            </div>

            <div class="form-group row">
                {{ Form::label('subject','Subject :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                {{ Form::text('subject','',['class'=>'col-md-7 form-control text-md-left','placeholder'=>'Enter Subject Name'])}}
            </div>
            <div class="form-group row">
                {{ Form::label('batch','Batch :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                {{ Form::text('batch','',['class'=>'col-md-3 form-control text-md-left','placeholder'=>'Enter Batch Name or Number Like:19th'])}}
            </div>

            <div class="form-group row">
                {{ Form::label('page1','Question Page1(Required):',['class'=>'col-md-3 col-form-label text-md-right'])}}
                {{ Form::file('page1') }}
            </div>

            <div class="form-group row">
                {{ Form::label('page2','Question Page2 :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                {{ Form::file('page2') }}
            </div>
            <div class="form-group row">
                {{ Form::label('page3','Question Page3 :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                {{ Form::file('page3') }}
            </div>

            <div class="form-group row justify-content-center">
                <button type="submit" class="col-md-2 ">Submit</button>
            </div>
            
        {!! Form::close() !!}
        
    </div>
@endsection