@extends('layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($types as $type )
        <tr>
            <th>{{$type->id}}</th>
            <td>
            <a href="{{route('admin.types.show', $type)}}">
                {{$type->name}}
            </a>
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
  </table>

@endsection
