@extends('layouts.app')

@section('content')
    <div>
        <h1>Question Details</h1>
        <hr>
    </div>
    <div class="jumbotron-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                {!! Form::open(['action'=>['AdminController@changeStatus'],'method'=>'POST']) !!}
                
                <input type="hidden" name="id" value="{{$question->id}}">

                {{-- varsity --}}
                <div class="form-group row">
                    {{ Form::label('versity','University Name :',['class'=>'col-md-3 col-form-label text-md-right'])}}

                    {{ Form::label('versity',$varsity,['class'=>'col-form-label text-md-left'])}}
                    
                </div>

                {{-- Semester --}}
                <div class="form-group row">
                    {{ Form::label('semester','Select Semester :',['class'=>'col-md-3 col-form-label text-md-right'])}}

                    @if ($question->semester=='sp')
                        {{ Form::label('semester','Spring',['class'=>'col-form-label text-md-left'])}}
                    @elseif($question->semester=='sm')
                        {{ Form::label('semester','Summer',['class'=>'col-form-label text-md-left'])}}
                    @else
                        {{ Form::label('semester','Fall',['class'=>'col-form-label text-md-left'])}}
                    @endif
                    &nbsp;&nbsp;
                    {{ Form::label('versity',$question->year,['class'=>'col-form-label '])}}
                </div>

                {{-- department --}}
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

                <div class="form-group row">
                    {{ Form::label('status','Status :',['class'=>'col-md-3 col-form-label text-md-right'])}}
                    
                    {{ Form::select('status',
                    [
                        '0'=>'Pending',
                        '1'=>'Approved',
                        '2'=>'Rejected'
                    ],$question->status,['class'=>'col-md-2']) }}

                </div>

                <div class="row form-group">
                    {{Form::label('comment','Comment:',['class'=>'col-md-3 col-form-label text-md-right'])}}
                    {{Form::textarea('comment',$question->comment,['class'=>'col-md-8 text-md-left','rows'=>'3'])}}
                </div>
                <div class="form-group row justify-content-center">
                    <button type="submit" class="col-md-2 ">Done</button>
                </div>
            
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection