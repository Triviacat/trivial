
@extends('layouts.app')

@section('title', __('trivial.createGame'))

@section('content')
@include('errors')
<form action="/games" method="post">
@csrf
    <game-form :user_id="{{ auth()->user()->id }}"></game-form>

    </form>



@endsection
