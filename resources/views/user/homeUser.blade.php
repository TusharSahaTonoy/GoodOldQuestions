@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div>
        <h1>User Panel</h1>
        <hr>
        <h3>Hello {{$user->name}}</h3>
        <h4>Email       :- {{$user->email}}</h4>
        <h4>University  :- {{$user->varsity}}</h4>
        </div>
        <br>
        
        <h2>Subbited Questions</h2>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <ul class="list-group">
                    @foreach ($questions as $question)
                        <li class="list-group-item">
                            <a href="{{route('qestion.detailQuestion',$question->id)}}" class="list-group-item list-group-item-action">{{$question->varsity}} (Created At - {{$question->created_at}})
                            @if($question->status==0)
                                #Pending#
                            @elseif($question->status==1)
                                #Approved#
                            @else
                                #Rejected#
                            @endif
                            </a>
                        </li>
                    @endforeach   
                </ul>
            </div>
        </div>
    </div>
@endsection