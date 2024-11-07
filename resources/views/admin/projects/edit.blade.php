@extends('layouts.create-edit')

@section('form-action')
    {{route('admin.projects.update', $project)}}
@endsection

@section('form-method')
    @method('PUT')
@endsection
