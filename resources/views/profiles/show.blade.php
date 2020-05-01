@extends('layouts.app')

@section('title', $user->name)


@section('content')
<div class="container">
    <div class="box">
        <profile></profile>
    </div>
</div>

@endsection
