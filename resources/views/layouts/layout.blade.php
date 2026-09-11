<!DOCTYPE html>
<html lang="fa" dit="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<header class="bg-white p-2">
    <a href="{{ route('index') }}">حساب کاربری</a>
    <a href="{{ route('messages_index') }}">صفحه اصلی</a>
</header>
<body class="p-4 md:p-8 bg-gray-50 min-h-screen flex flex-col items-center">
    @yield('content')
</body>
</html>
