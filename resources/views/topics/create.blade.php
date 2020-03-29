
@extends('layouts.app')

@section('title', 'Create a new topic')

@section('content')
<h1 class="is-size-1">Create Topic</h1>
    <form action="/topics" method="post">
        @include ('topics.form', [
            'topic' => new App\Topic,
              'buttonText' => 'Create topic'
          ])    </form>

  @include('errors')

@endsection
