
@extends('layouts.app')

@section('title', 'Create a new role')

@section('content')
<h1 class="is-size-1">Create Role</h1>
    <form action="/roles" method="post">
        @include ('roles.form', [
            'role' => new App\Role,
              'buttonText' => 'Create role'
          ])    </form>

  @include('errors')

@endsection
