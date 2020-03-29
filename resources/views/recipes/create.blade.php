
@extends('layouts.app')

@section('title', 'Create a new recipe')

@section('content')
<h1 class="is-size-1">Create Recipe</h1>
    <form action="/recipes" method="post">
        @include ('recipes.form', [
            'recipe' => new App\Recipe,
              'buttonText' => 'Create recipe'
          ])    </form>

  @include('errors')

@endsection
