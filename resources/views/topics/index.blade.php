@extends('layouts.app')

@section('title', 'Topics')


@section('content')

<a class="button content" href="/topics/create">Create</a>
  <table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
      <tr>
        <th>Topic</th>
        <th>Color</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($topics as $topic)

        <tr>
            <td><a href="/topics/{{ $topic->id }}">{{ $topic->title }}</a></td>
            <td style="background-color:{{ $topic->color }}">{{ $topic->color }}</td>
            <td>
                <a href="/topics/{{ $topic->id }}/edit" class="button is-success is-small">Edit</a>
                <form method="post" action="/topics/{{ $topic->id }}" style="display: inline-block;" onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">Delete topic</button>
                </form>
            </td>
          </tr>

      @endforeach
    </tbody>
  </table>




@endsection
