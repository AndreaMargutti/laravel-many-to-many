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

<form action="@yield('form-action')" method="POST">
    @csrf
    @yield('form-method')

    <label for="project-name" class="form-label">Project Name</label>
    <input type="text" id="project-name" name="name" class="form-control"
    value="{{$project->name}}">

    <label for="project-type" class="form-label">Type:</label>
    <select name="type_id" id="project-type">

        @foreach ($types as $type )
            <option value="{{$type->id}}">{{$type->name}}</option>
        @endforeach

    </select>

    <div>
        <label for="form-check">Technologies:</label>
        @foreach ($technologies as $technology)
        <div class="form-check" id="form-check">
            <input class="form-check-input" type="checkbox" id="technology_check" name="technologies[]" value="{{$technology->id}}"
            @if ($project->technologies->contains($technology))
                checked
            @endif>
            <label class="form-check-label" for="technology_check" name="technologies[]">
                {{$technology->name}}
            </label>
        </div>
        @endforeach
    </div>


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
