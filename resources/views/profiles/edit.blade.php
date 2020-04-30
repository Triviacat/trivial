
@inject('users', 'App\Set')
@inject('roles', 'App\Role');
@inject('permissions', 'App\Permission')

@extends('layouts.app')

@section('title', 'Edit user: ' . $user->name)
@section('content')
<form action="{{ route('admin.users.update', $user->id) }}" method="post">
        @method('PATCH')
        @include ('users.form', [
            'roles' => $roles,
            'permissions' => $permissions,
            'buttonText' => 'Update user'
        ])
    </form>

  @include('errors')

@endsection
