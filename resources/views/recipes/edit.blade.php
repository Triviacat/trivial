
@inject('recipes', 'App\Recipe')

@extends('layouts.app')

@section('title', 'Edit recipe: ' . $recipe->title)
@section('content')
<form action="/recipes/{{ $recipe->id }}" method="post">
        @method('PATCH')
        @include ('recipes.form', [
            'buttonText' => 'Update recipe'
        ])
    </form>

  @include('errors')

@endsection
