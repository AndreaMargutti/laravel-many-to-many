@extends('layouts.app')

@section('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Members</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project )
        <tr>
            <th>{{$project->id}}</th>
            <td>
                {{$project->name}}
            </td>
            <td>{{$project->members}}</td>
            <td>{{$project->description}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection