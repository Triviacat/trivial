@inject('topics', 'App\Topic');
@inject('sets', 'App\Set');

@extends('layouts.app')

@section('title', 'Create a new question')

@section('content')
<form action="/questions" method="post">
    @include ('questions.form', [
    'question' => new App\Question,
    'topics' => $topics,
    'sets' => $sets,
    'buttonText' => 'Create question'
    ]) </form>

@include('errors')

@endsection
