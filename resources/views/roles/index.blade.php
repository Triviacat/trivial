@extends('layouts.app')

@section('title', 'Roles')


@section('content')

<a class="button content" href="/roles/create">Create</a>
  <table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
      <tr>
        <th>Role</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)

        <tr>
            <td><a href="/roles/{{ $role->id }}">{{ $role->display_name }}</a></td>
            <td>
                <a href="/roles/{{ $role->id }}/edit" class="button is-success is-small">Edit</a>
                <form method="post" action="/roles/{{ $role->id }}" style="display: inline-block;" onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">Delete role</button>
                </form>
            </td>
          </tr>

      @endforeach
    </tbody>
  </table>




@endsection
