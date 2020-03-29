
@inject('permissions', 'App\Permission')

@extends('layouts.app')

@section('title', 'Edit permission: ' . $permission->title)
@section('content')
<form action="/permissions/{{ $permission->id }}" method="post">
        @method('PATCH')
        @include ('permissions.form', [
            'buttonText' => 'Update permission'
        ])
    </form>

  @include('errors')

@endsection
