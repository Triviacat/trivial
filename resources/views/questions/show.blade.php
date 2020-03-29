@extends('layouts.app')

{{-- @section('title', $question->title) --}}


@section('content')


<div class="card">
<header class="card-header" style="background-color:{{ $question->topic->color}}">
        <p class="card-header-title">
            Question - {{ $question->topic->title }}
        </p>
    </header>
    <div class="card-content">
        <div class="content">
            <p class="title">{{ $question->title }}</p>
            <p>{!! nl2br($question->text) !!}</p>
        </div>
    </div>
</div>

<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            Answer
        </p>
    </header>
    <div class="card-content">
        <div class="content">
            <p class="title">{{ $question->answer }}</p>
        </div>
    </div>
    <footer class="card-footer">
    <a href="{{ route('questions.edit', $question->id) }}" class="card-footer-item">Edit</a>
    </footer>
</div>



@endsection
