@extends('layouts.app')

@section('title', 'Questions')


@section('content')

<a class="button content" href="/questions/create">Create</a>

<div class="card content">
    <header class="card-header">
        <p class="card-header-title">Search</p>
    </header>
    <div class="card-content">
        <form method="GET" id="searchForm">
            <div class="field is-grouped">
                <div class="control">
                    <input type="text" class="input" name="q" id="q" value="{{ request('q') }}">
                </div>
                <div class="control">
                    <button type="submit" class="button is-info">
                        @if (isset($title))
                        Search {{ $title }}
                        @else
                        Search all
                        @endif
                    </button>
                </div>
                <a href="{{ route('questions.index') }}" class="button">Clear</a>
            </div>
        </form>
    </div>
    {{-- <footer class="card-footer">
        <a href="{{ route('questions.orphan') }}" class="card-footer-item">List orphan</a>
        <a href="{{ route('questions.emptyPrice') }}" class="card-footer-item">List empty price</a>
    </footer> --}}

</div>

  <table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
      <tr>
        <th>Topic</th>
        <th>Question</th>
        <th>Answer</th>
        <th>Set</th>

        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($questions as $question)

        <tr>
            <td style="background-color:{{ $question->topic->color }}"> {{ $question->topic->title }} </td>
            <td><a href="/questions/{{ $question->id }}">{{ $question->title }}</a></td>
        <td>{{ $question->answer }}</td>
        <td>{{ $question->set->title ?? '' }}</td>
            <td>
                <a href="/questions/{{ $question->id }}/edit" class="button is-success is-small">Edit</a>
                <form method="post" action="/questions/{{ $question->id }}" style="display: inline-block;" onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">Delete question</button>
                </form>
            </td>
          </tr>

      @endforeach
    </tbody>
  </table>

  {{ $questions->appends(Request::except('page'))->render() }}


@endsection
