@extends('layouts.app')

@section('title', $user->name)


@section('content')
<div class="container">
    <div class="box">
        {{-- @dump($user) --}}
        <profile :user="{{ $user }}"></profile>
    </div>
</div>

@endsection
