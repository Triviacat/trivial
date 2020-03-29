
@inject('sets', 'App\Set')

@extends('layouts.app')

@section('title', 'Edit set: ' . $set->title)
@section('content')
<form action="/sets/{{ $set->id }}" method="post">
        @method('PATCH')
        @include ('sets.form', [
            'buttonText' => 'Update set'
        ])
    </form>

  @include('errors')

@endsection
