@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h1>{{$project->name}}</h1>
        </div>
        <div class="card-title">
            <h2><b>{{$project->type->name}}</b></h2>
        </div>
        <h3>
           Made by: {{$project->members}}
        </h3>
        @foreach ($project->technologies as $technology )
        <span class="badge text-bg-info">{{$technology->name}}</span>
        @endforeach
        <p>
            {{$project->description}}
        </p>
    </div>
</div>

@endsection
