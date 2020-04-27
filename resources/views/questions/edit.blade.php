@inject('topics', 'App\Topic');
@inject('sets', 'App\Set');
@inject('questions', 'App\Question')

@extends('layouts.app')

@section('title', __('trivial.updateQuestion') . ': ' . $question->title)
@section('content')
<form action="/questions/{{ $question->id }}" method="post">
        @method('PATCH')
        @include ('questions.form', [
            'topics' => $topics,
            'sets' => $sets,
            'buttonText' => __('trivial.updateQuestion')
        ])
    </form>

  @include('errors')

@endsection
