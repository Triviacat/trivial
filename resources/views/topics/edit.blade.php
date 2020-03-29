
@inject('topics', 'App\Topic')

@extends('layouts.app')

@section('title', 'Edit topic: ' . $topic->title)
@section('content')
<form action="/topics/{{ $topic->id }}" method="post">
        @method('PATCH')
        @include ('topics.form', [
            'buttonText' => 'Update topic'
        ])
    </form>

  @include('errors')

@endsection
