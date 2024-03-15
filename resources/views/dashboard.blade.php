<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Welcome to Dashboard</h1>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{ __('You are logged in!') }}
    <p>This is the content area of your dashboard.</p>
@endsection
