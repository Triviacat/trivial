@extends('layouts.app')

@section('title', 'Recipes')


@section('content')

<a class="button content" href="/recipes/create">Create</a>
  <table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
      <tr>
        <th>Recipe</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($recipes as $recipe)
        @if ($recipe->id == 1)
        {{-- Don't show buttons nor link to the legacy recipe --}}
        <tr>
            <td>{{ $recipe->title }}</td>
            <td></td>
        </tr>
        @else
        <tr>
            <td><a href="/recipes/{{ $recipe->id }}">{{ $recipe->title }}</a></td>
            <td>
                <a href="/productions/{{ $recipe->id }}/create" class="button is-warning is-small">Create production</a>
                <a href="/recipes/{{ $recipe->id }}/edit" class="button is-success is-small">Edit</a>
                <form method="post" action="/recipes/{{ $recipe->id }}" style="display: inline-block;" onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">Delete recipe</button>
                </form>
            </td>
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>

  </ul>


@endsection
