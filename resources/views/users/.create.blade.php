
@extends('layouts.app')

@section('title', 'Create a new user')

@section('content')
<h1 class="is-size-1">Create Set</h1>
    <form action="/users" method="post">
        @include ('users.form', [
            'user' => new App\Set,
              'buttonText' => 'Create user'
          ])    </form>

  @include('errors')

@endsection
