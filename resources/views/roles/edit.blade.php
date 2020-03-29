
@inject('roles', 'App\Role')

@extends('layouts.app')

@section('title', 'Edit role: ' . $role->title)
@section('content')
<form action="/roles/{{ $role->id }}" method="post">
        @method('PATCH')
        @include ('roles.form', [
            'buttonText' => 'Update role'
        ])
    </form>

  @include('errors')

@endsection
