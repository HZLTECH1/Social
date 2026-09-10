@extends('layouts.layout')
@section('title', 'Messages')
@section('content')

    @auth
        <h1 class="text-blue-600 text-2xl font-bold mb-4">نام شما: {{ auth()->user()->name }}</h1>
    @endauth

    <main class="flex flex-col gap-3 max-w-2xl mx-auto p-4">

        @foreach ($messages as $message)

            @if ($message->user_id === auth()->id())
                {{-- YOUR message --}}
                <div class="self-end bg-blue-500 text-white p-3 rounded-lg max-w-xs shadow">
                    <p class="font-bold">{{ $message->content }}</p>
                    @if ($message->image)
                        <img src="{{ asset('images/' . $message->image) }}" alt="" class="w-32 rounded mt-2">
                    @endif
                    <span class="text-xs text-blue-200 block mt-1 text-right">
                        {{ $message->created_at->format('H:i') }}
                    </span>
                </div>
            @else
                {{-- THEIR message --}}
                <div class="self-start bg-gray-200 text-gray-900 p-3 rounded-lg max-w-xs shadow">
                    <p class="text-xs font-bold text-gray-500 mb-1">{{ $message->user->name }}</p>
                    <p>{{ $message->content }}</p>
                    @if ($message->image)
                        <img src="{{ asset('images/' . $message->image) }}" alt="" class="w-32 rounded mt-2">
                    @endif
                    <span class="text-xs text-gray-400 block mt-1">
                        {{ $message->created_at->format('H:i') }}
                    </span>
                </div>
            @endif

        @endforeach

    </main>

    <form action="{{ route('create_message') }}" method="post" enctype="multipart/form-data"
          class="max-w-2xl mx-auto p-4 flex gap-2">
        @csrf
        <input type="text" name="content" placeholder="پیام خود را بنویسید..."
               class="flex-1 p-2 border rounded">
        <input type="file" name="image" id="image" class="p-2">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">ارسال</button>
    </form>

@endsection