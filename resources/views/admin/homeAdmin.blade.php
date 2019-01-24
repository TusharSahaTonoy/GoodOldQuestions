@extends('layouts.app')

@section('content')
    <h1>Welcome Admin</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pending Questions: {{$pendingCount}}</h5>
                        <a href="{{route('admin.listQuestions','0')}}" class="btn btn-primary">Let's See</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Approved Questions: {{$approveCount}} </h5>
                        <a href="{{route('admin.listQuestions','1')}}" class="btn btn-primary">Let's See</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rejected Questions: {{$rejectedCount}} </h5>
                        <a href="{{route('admin.listQuestions','2')}}" class="btn btn-primary">Let's See</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Questions: {{$totalCount}} </h5>
                        <a href="{{route('admin.listQuestions','all')}}" class="btn btn-primary">Let's See</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
