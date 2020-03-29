@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif
<div class="tile is-ancestor">
    <div class="tile is-parent is-4">
            <div class="tile notification is-primary is-child">

                </div>

    </div>
    <div class="is-parent tile is-4">
            <div class="tile notification is-primary is-child">

                </div>
    </div>


</div>

@endsection
