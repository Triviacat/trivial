
@extends('layouts.app')

@section('title', 'Create a new permission')

@section('content')
<h1 class="is-size-1">Create Permission</h1>
    <form action="/permissions" method="post">
        @include ('permissions.form', [
            'permission' => new App\Permission,
              'buttonText' => 'Create permission'
          ])    </form>

  @include('errors')

@endsection
