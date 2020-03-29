@extends('layouts.app')

@section('title', $recipe->title)


@section('content')

<h3 class="is-size-3">Flours</h3>
<a class="button is-success" href="/recipes/{{ $recipe->id }}/ingredients_flours/create">Add a flour ingredient</a>
<table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
        <tr>
            <th>Ingredient</th>
            <th>Weight</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recipe->ingredients_flours as $flour)
        <tr>
            <td>{{ $flour->title }}</td>
            <td>{{ $flour->weight }}</td>
            <td><a class="button is-success is-small"
                    href="/recipes/{{ $recipe->id }}/ingredients_flours/{{ $flour->id }}/edit">Edit</a>
                <form method="post" action="/flours/{{ $flour->id }}" style="display: inline-block;"
                    onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <th>Total</th>
            <th>{{ $recipe->recipe_flours }}</th>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

<h3 class="is-size-3">Others</h3>
<a class="button is-success" href="/recipes/{{ $recipe->id }}/ingredients_others/create">Add an other ingredient</a>
<table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
        <tr>
            <th>Ingredient</th>
            <th>Weight</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recipe->ingredients_others as $other)
        <tr>
            <td>{{ $other->title }}</td>
            <td>
                {{ $other->weight }}
            </td>
            <td><a class="button is-success is-small"
                    href="/recipes/{{ $recipe->id }}/ingredients_others/{{ $other->id }}/edit">Edit</a>
                <form method="post" action="/others/{{ $other->id }}" style="display: inline-block;"
                    onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <th>Total</th>
            <th>{{ $recipe->recipe_others }}</th>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

<h3 class="is-size-3">Liquids</h3>
<a class="button is-success" href="/recipes/{{ $recipe->id }}/ingredients_liquids/create">Add a liquid ingredient</a>
<table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
        <tr>
            <th>Ingredient</th>
            <th>Weight</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recipe->ingredients_liquids as $liquid)
        <tr>
            <td>{{ $liquid->title }}</td>
            <td>
                {{ $liquid->weight }}
            </td>
            <td><a class="button is-success is-small"
                    href="/recipes/{{ $recipe->id }}/ingredients_liquids/{{ $liquid->id }}/edit">Edit</a>
                <form method="post" action="/liquids/{{ $liquid->id }}" style="display: inline-block;"
                    onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <th>Total</th>
            <th>{{ $recipe->recipe_liquids }}</th>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>



<h3 class="is-size-3">Sourdoughs</h3>
<a class="button is-success" href="/recipes/{{ $recipe->id }}/ingredients_sourdoughs/create">Add an sourdough
    ingredient</a>
<table class="table is-fullwidth is-hoverable is-striped is-narrow">
    <thead>
        <tr>
            <th>Ingredient</th>
            <th>Weight</th>
            <th>Humidity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recipe->ingredients_sourdoughs as $sourdough)
        <tr>
            <td>{{ $sourdough->title }}</td>
            <td>
                {{ $sourdough->weight }}
            </td>
            <td>
                {{ $sourdough->humidity }}
            </td>
            <td><a class="button is-success is-small"
                    href="/recipes/{{ $recipe->id }}/ingredients_sourdoughs/{{ $sourdough->id }}/edit">Edit</a>
                <form method="post" action="/sourdoughs/{{ $sourdough->id }}" style="display: inline-block;"
                    onsubmit="return confirm('Do you really want to delete?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="button is-danger is-small">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <th>Total</th>
            <th>{{ $recipe->recipe_sourdoughs }}</th>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

<div class="columns">
    <div class="column">
        <div class="card">
            <div class="card-header">
                <p class="card-header-title">Recipe data</p>
            </div>
            <div class="card-content">
                <p>Recipe flours: {{ $recipe->recipe_flours }}</p>
                <p>Recipe liquids: {{ $recipe->recipe_liquids }}</p>
                <p>Recipe others: {{ $recipe->recipe_others }}</p>
                <p>Recipe recipe: {{ $recipe->recipe_total }}</p>
                <p>Recipe humidity: {{ $recipe->recipe_humidity }}</p>
                <p>Notes: {{ $recipe->notes }}</p>
            </div>
        </div>
    </div>
    <div class="column">
        <div class="card">
            <div class="card-header">
                <p class="card-header-title">Total data</p>
            </div>
            <div class="card-content">
                <p>Total flours: {{ $recipe->total_flours }}</p>
                <p>Total liquids: {{ $recipe->total_liquids }}</p>
                <p>Total others: {{ $recipe->total_others }}</p>
                <p>Total recipe: {{ $recipe->total_total }}</p>
                <p>Total humidity: {{ $recipe->total_humidity }}</p>
            </div>
        </div>
    </div>
    <div class="column">
        <div class="card">
            <div class="card-header">
                <p class="card-header-title">Actions</p>
            </div>
            <div class="card-content">
                <div class="field is-grouped">
                    <div class="control"><a href="/recipes/{{ $recipe->id }}/edit" class="button is-success">Edit
                            recipe</a></div>
                    <div class="control">
                        <form method="post" action="/recipes/{{ $recipe->id }}"
                            onsubmit="return confirm('Do you really want to delete?');">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="button is-danger">Delete recipe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
