@extends('layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($technologies as $technology )
        <tr>
            <th>{{$technology->id}}</th>
            <td>{{$technology->name}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>

@endsection
