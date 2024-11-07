@extends('layouts.app')


@section('content')

<h1 class="py-3">Sono l'indice</h1>

<button class="btn btn-outline-primary btn-lg mb-3">
    <a href="{{route('admin.projects.create')}}">
        Create New Project
    </a>
</button>

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
            <a href="{{route('admin.projects.show', $project)}}">
                {{$project->name}}
            </a>
            </td>
            <td>{{$project->members}}</td>
            <td>{{$project->description}}</td>
            <td>
                <button class="btn btn-primary">
                    <a href="{{route('admin.projects.edit', $project)}}">
                        Edit
                    </a>
                </button>
                <form action="{{route('admin.projects.delete', $project)}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-warning">
                        Delete
                    </button>
                </form>


            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

@endsection
