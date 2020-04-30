@extends('layouts.app')

@section('title', 'Users')


@section('content')

<a class="button content" href="/users/create">Create</a>
  <table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
      <tr>
        <th>Uid</th>
        <th>Name</th>
        <th>Rols</th>
        <th>Permissions</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)

        <tr>
            <td><a href="/users/{{ $user->id }}">{{ $user->id }}</a></td>
            <td><a href="/users/{{ $user->id }}">{{ $user->name }}</a></td>
            <td>{{ $user->roles }}</td>
            <td>{{ $user->permissions }}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user->id) }}" class="button is-success is-small">Edit</a>
                {{-- <form method="post" action="/users/{{ $user->id }}" style="display: inline-block;" onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">Delete user</button>
                </form> --}}
            </td>
          </tr>

      @endforeach
    </tbody>
  </table>




@endsection
