@extends('layouts.app')

@section('content')
<h1>Pending Posts</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <ul>
                        @foreach ($questions as $question)
                            <li>
                                <a href="{{route('admin.pendingQuestion',$question->id)}}" class="list-group-item list-group-item-action">{{$question->varsity}}</a>
                            </li>
                        @endforeach   
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection