
@extends('layouts.app')

@section('title', __('trivial.createRole'))

@section('content')
    <form action="/roles" method="post">
        @include ('roles.form', [
            'role' => new App\Role,
              'buttonText' => __('trivial.createRole')
          ])    </form>

  @include('errors')

@endsection
