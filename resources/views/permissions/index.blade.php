@extends('layouts.app')

@section('title', __('trivial.permissions'))


@section('content')

<a class="button content" href="/permissions/create">@lang('trivial.create')</a>
  <table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
      <tr>
        <th>@lang('trivial.permission')</th>
        <th>@lang('trivial.actions')</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission)

        <tr>
            {{-- <td><a href="/permissions/{{ $permission->id }}">{{ $permission->display_name }}</a></td> --}}
            <td>{{ $permission->display_name }}</td>
            <td>
                <a href="/permissions/{{ $permission->id }}/edit" class="button is-success is-small">@lang('trivial.doEdit')</a>
                <form method="post" action="/permissions/{{ $permission->id }}" style="display: inline-block;" onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">@lang('trivial.doDelete')</button>
                </form>
            </td>
          </tr>

      @endforeach
    </tbody>
  </table>




@endsection
