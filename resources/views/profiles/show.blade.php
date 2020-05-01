@extends('layouts.app')

@section('title', $user->name)


@section('content')
<div class="container">
    <div class="box">
        <profile :user={{ $user }}></profile>
    </div>
</div>

@endsection
