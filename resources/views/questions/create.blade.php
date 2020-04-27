@inject('topics', 'App\Topic');
@inject('sets', 'App\Set');

@extends('layouts.app')

@section('title', __('trivial.createQuestion'))

@section('content')
<form action="/questions" method="post">
    @include ('questions.form', [
    'question' => new App\Question,
    'topics' => $topics,
    'sets' => $sets,
    'buttonText' => __('trivial.createQuestion')
    ]) </form>

@include('errors')

@endsection
