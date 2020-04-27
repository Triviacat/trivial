
@extends('layouts.app')

@section('title', __('trivial.createPermission'))

@section('content')
    <form action="/permissions" method="post">
        @include ('permissions.form', [
            'permission' => new App\Permission,
              'buttonText' => __('trivial.createPermission')
          ])    </form>

  @include('errors')

@endsection
