@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- category --}}
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['action'=>'HomeController@searchQuestion','method'=>'POST']) !!}
                            {{-- varsity --}}
                            <div class="form-group row">
                                {{ Form::label('versity','University Name :',['class'=>'col-md-4 col-form-label text-md-right'])}}
                                
                                {{ Form::select('varsity',$varsities,null,['class'=>'col-md-7','placeholder' => 'Pick a varsity']) }}
                            </div>
                            {{-- Semester --}}
                            <div class="form-group row">
                                {{ Form::label('semester','Select Semester :',['class'=>'col-md-4 col-form-label text-md-right'])}}
                                
                                {{ Form::select('semester',[
                                    'sp'=>'Spring',
                                    'sm'=>'Summer',
                                    'fa'=>'Fall'
                                    ], null,['class'=>'col-md-4','placeholder' => 'Pick a semester']) }}
                                &nbsp;&nbsp;
                                {{ Form::label('versity','Year:',['class'=>'col-form-label  text-md-right'])}}
                                {!! Form::selectRange('year', 2010, 2019,null,['class'=>' col-md-2','placeholder' => 'Pick year']) !!}
                            </div>

                            <div class="form-group row">
                                {{ Form::label('department','Department :',['class'=>'col-md-4 col-form-label text-md-right'])}}
                                
                                {{ Form::select('department',$departments,null,['class'=>'col-md-7 text-md-left','placeholder' => 'Pick Department']) }}
                
                            </div>

                            <div class="form-group row justify-content-center">
                                <button type="submit" class="col-md-3 ">Search</button>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            {{-- questionlist --}}
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($questions as $question)
                            <li class="list-group-item">
                                <a href="{{route('qestion.detailQuestion',$question->id)}}" class="btn btn-primary">{{$varsities[$question->varsity]}} - ({{$question->created_at}})</a>
                            </li>
                            @endforeach
                        </ul>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
