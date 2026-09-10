@extends('layouts.layout')
@section('title', 'Users')
@section('content')
    @if (Auth::user())
        <h1 style="color: blue;">نام شما: {{ Auth::user()->name }}</h1>
    @endif
    @if (session('status'))
        <h1 style="color: blue;">{{ session('status') }}</h1>
    @endif
    @foreach ($users as $user)
        <h3>{{ $user->name }}</h3>
    @endforeach
    <h1>ساخت حساب کاربری</h1>
    <form action="{{ route('create_user') }}" method="post">
        @csrf
        <input type="text" placeholder="Enter Name" name="name">
        <input type="text" placeholder="Enter Password" name="password">
        <button>ساخت حساب کاربری</button>
    </form>
    <h1>لاگین</h1>
    <form action="{{ route('login_user') }}" method="post">
        @csrf
        <input type="text" placeholder="Enter Name" name="name">
        <input type="text" placeholder="Enter Password" name="password">
        <button>ورود</button>
    </form>
    <h1>خارج شدن</h1>
    <form action="{{ route('logout_user') }}" method="post">
        @csrf
        <button>خروج</button>
    </form>
@endsection