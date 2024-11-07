@extends('layouts.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('admin.projects.update', $project)}}" method="POST">
    @csrf
    @method('PUT')

    <label for="project-name" class="form-label">Project Name</label>
    <input type="text" id="project-name" name="name" class="form-control"
    value="{{$project->name}}">

    <label for="project-type" class="form-label">Type:</label>
    <select name="type_id" id="project-type">

        @foreach ($types as $type )
            <option value="{{$type->id}}">{{$type->name}}</option>
        @endforeach

    </select>

    <label for="project-members" class="form-label">Project Members</label>
    <input type="text" id="project-members" name="members" class="form-control"
    value="{{$project->members}}">

    <label for="project-description" class="form-label">Project Description</label>
    <input type="textarea" id="project-description" name="description" class="form-control"
    value="{{$project->description}}">

    <div class="py-3">
        <button type="submit" class="btn btn-success">Inserisci Progetto</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </div>
</form>
</div>

@endsection
