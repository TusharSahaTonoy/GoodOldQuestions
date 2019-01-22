@extends('layouts.app')

@section('content')
    <div>
        <h1>Question Details</h1>
        <hr>
    </div>
    <div class="jumbotron-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                {!! Form::open() !!}
                
                {{-- varsity --}}
                <div class="form-group row">
                    {{ Form::label('versity','University Name :',['class'=>'col-md-3 col-form-label text-md-right'])}}

                    {{ Form::label('versity',$varsity,['class'=>'col-form-label text-md-left'])}}
                    
                </div>
                {{-- Semester --}}
                <div class="form-group row">
                    {{ Form::label('semester','Semester :',['class'=>'col-md-3 col-form-label text-md-right'])}}

                    @if ($question->semester=='sp')
                        {{ Form::label('semester','Spring',['class'=>' col-form-label text-md-left'])}}
                    @elseif($question->semester=='sm')
                        {{ Form::label('semester','Summer',['class'=>' col-form-label text-md-left'])}}
                    @else
                        {{ Form::label('semester','Fall',['class'=>'col-form-label text-md-left'])}}
                    @endif
                    &nbsp;&nbsp;
                    {{ Form::label('versity',$question->year,['class'=>'col-form-label '])}}
                </div>

                <div class="form-group row">
                    {{ Form::label('department','Department :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                    
                    {{ Form::label('department',$department,['class'=>'col-form-label text-md-left'])}}

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

                {{-- auth check --}}
                @if(Auth::check())
                    <div class="form-group row">
                        {{ Form::label('status','Status :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                        
                        @if ($question->status=='0')
                            {{ Form::label('status','Pending',['class'=>'col-form-label text-md-left'])}}
                        @elseif($question->status=='1')
                            {{ Form::label('status','Approve',['class'=>'col-form-label text-md-left'])}}
                        @else
                            {{ Form::label('status','Rejected',['class'=>'col-form-label text-md-left'])}}
                        @endif

                    </div>

                    <div class="row form-group">
                        {{Form::label('comment','Comment:',['class'=>'col-md-3 col-form-label text-md-right'])}}
                        {{Form::label('comment',$question->comment,['class'=>' col-form-label text-md-left'])}}                    
                    </div>
                    {{-- user check --}}
                    @if(Auth::user()->id==$question->user_id)
                    <div class="form-group row justify-content-center">
                        <a href="#" class="col-sm-2 ">Edit</a>
                        <a href="#" class="col-sm-2 ">Delete</a>
                    </div>
                    @endif
                @endif
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection