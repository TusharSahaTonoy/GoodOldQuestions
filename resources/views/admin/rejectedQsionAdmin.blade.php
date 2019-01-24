@extends('layouts.app')

@section('content')
<h1>Rejected Questions</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($questions as $question)
                            <li class="list-group-item list-group-item-action">
                                <a href="{{route('admin.detailQuestion',$question->id)}}" class="btn btn-primary "> 
                                {{$varsities[$question->varsity]}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection