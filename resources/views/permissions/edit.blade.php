
@inject('permissions', 'App\Permission')

@extends('layouts.app')

@section('title', __('trivial.editPermission') . $permission->title)
@section('content')
<form action="/permissions/{{ $permission->id }}" method="post">
        @method('PATCH')
        @include ('permissions.form', [
            'buttonText' => __('trivial.updatePermission')
        ])
    </form>

  @include('errors')

@endsection
