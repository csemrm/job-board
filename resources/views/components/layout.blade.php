<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Job Board</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-cyan-100 to-blue-400 text-slate-700">
    <nav class="mb-8 flex justify-between
    text-lg font-medium">
        <ul class="flex space-x-2">
            <li>
                <a href="{{ route('jobs.index') }}"> Home</a>
            </li>
        </ul>
        <ul class="flex space-x-2">
            @auth
                <li>
                    <a href="{{ route('my-job-applications.index') }}">
                        {{ auth()->user()->name ?? 'anonymous' }}: Applications
                    </a>
                </li>
                <li>
                    <a href="{{ route('my-jobs.index') }}">
                        My Jobs
                    </a>
                </li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">LogOut</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('auth.create') }}">Sign In</a>
                </li>
            @endauth
        </ul>
    </nav>
    @if (session('success'))
        <div class="mb-4 rounded-md border-l-4 border-gray-100 p-4 bg-green-300 text-green-700">
            <p class="font-bold">Success! </p>
            <p>{{ session('success') }} </p>
        </div>
    @endif
    @if (session('error'))
        <div class="mb-4 rounded-md border-l-4 border-red-100 p-4 bg-red-300 text-red-700">
            <p class="font-bold">Error! </p>
            <p>{{ session('error') }} </p>
        </div>
    @endif
    {{ $slot }}
</body>

</html>
