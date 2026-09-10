@extends('layouts.layout')
@section('title', 'Users')
@section('content')
    @if ($user)
        <h1 style="color: blue;">پیام های: {{ $user->name }}</h1>
    @endif
    @foreach ($messages as $message)
        <h3>{{ $message->content }}</h3>
        @if ($message->image)
            <img src="{{ asset('images/sccc.png') }}" alt="">
        @endif
    @endforeach
@endsection