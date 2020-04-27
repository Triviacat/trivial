@extends('layouts.app')

@section('title', 'Questions')


@section('content')

<a class="button content" href="/questions/create">@lang('trivial.create')</a>

<div class="card content">
    <header class="card-header">
        <p class="card-header-title">@lang('trivial.search')</p>
    </header>
    <div class="card-content">
        <div class="columns">
            <div class="column is-half">
                <form method="GET" id="searchForm">
                    <div class="field">
                        <label class="label">@lang('trivial.question')</label>
                        <div class="control">
                            <input type="text" class="input" name="q" id="q" value="{{ request('q') }}">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">@lang('trivial.answer')</label>
                        <div class="control">
                            <input type="text" class="input" name="a" id="a" value="{{ request('a') }}">
                        </div>
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-info">
                                @if (isset($title))
                                    @lang('trivial.search') {{ $title }}
                                @else
                                    @lang('trivial.searchAll')
                                @endif
                            </button>
                        </div>
                        <div class="control">
                            <a href="{{ route('questions.index') }}" class="button">@lang('trivial.clear')</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

  <table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
      <tr>
        <th>@lang('trivial.topic')</th>
        <th>@lang('trivial.question')</th>
        <th>@lang('trivial.answer')</th>
        <th>@lang('trivial.set')</th>

        <th>@lang('trivial.actions')</th>
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
                <a href="/questions/{{ $question->id }}/edit" class="button is-success is-small">@lang('trivial.edit')</a>
                <form method="post" action="/questions/{{ $question->id }}" style="display: inline-block;" onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">@lang('trivial.delete')</button>
                </form>
            </td>
          </tr>

      @endforeach
    </tbody>
  </table>

  {{ $questions->appends(Request::except('page'))->render() }}


@endsection
