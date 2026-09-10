@extends('layouts.layout')
@section('title', 'Users')
@section('content')
    @if (Auth::user())
        <h1 style="color: blue;">نام شما: {{ Auth::user()->name }}</h1>
    @endif
    <main style="display: flex; width: 100vw;" class="flex-col text-3xl">
            @foreach ($messages as $message)
            @if ($message->user != Auth::user())
            <div class="flex flex-col self-start gap-4">
                <h2>{{$message->content }}</h2>
                @if ($message->image)
                <img src="{{ asset('images/'. $message->image) }}" alt="" class="w-40">
                @endif
            </div>
            @else
            <div class="flex flex-col self-end gap-4">
                <h2 class="font-black">{{$message->content }}</h2>
            @if ($message->image)
                <img src="{{ asset('images/'. $message->image) }}" alt="" class="w-40">
            @endif
            @endif
            @endforeach
        </main>
    <h1>ساخت حساب کاربری</h1>
    <form action="{{ route('create_message') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="Enter message" name="content">
        <input type="file" name="image" id="image">
        <button>ارسال</button>
    </form>
@endsection
