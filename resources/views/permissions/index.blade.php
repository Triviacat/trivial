@extends('layouts.app')

@section('title', 'Permissions')


@section('content')

<a class="button content" href="/permissions/create">Create</a>
  <table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
      <tr>
        <th>Permission</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission)

        <tr>
            <td><a href="/permissions/{{ $permission->id }}">{{ $permission->display_name }}</a></td>
            <td>
                <a href="/permissions/{{ $permission->id }}/edit" class="button is-success is-small">Edit</a>
                <form method="post" action="/permissions/{{ $permission->id }}" style="display: inline-block;" onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">Delete permission</button>
                </form>
            </td>
          </tr>

      @endforeach
    </tbody>
  </table>




@endsection
