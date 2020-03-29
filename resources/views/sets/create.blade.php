
@extends('layouts.app')

@section('title', 'Create a new set')

@section('content')
<h1 class="is-size-1">Create Set</h1>
    <form action="/sets" method="post">
        @include ('sets.form', [
            'set' => new App\Set,
              'buttonText' => 'Create set'
          ])    </form>

  @include('errors')

@endsection
