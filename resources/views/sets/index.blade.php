@extends('layouts.app')

@section('title', 'Sets')


@section('content')

<a class="button content" href="/sets/create">Create</a>
  <table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
      <tr>
        <th>Set</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($sets as $set)

        <tr>
            <td><a href="/sets/{{ $set->id }}">{{ $set->title }}</a></td>
            <td>
                <a href="/sets/{{ $set->id }}/edit" class="button is-success is-small">Edit</a>
                <form method="post" action="/sets/{{ $set->id }}" style="display: inline-block;" onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">Delete set</button>
                </form>
            </td>
          </tr>

      @endforeach
    </tbody>
  </table>




@endsection
