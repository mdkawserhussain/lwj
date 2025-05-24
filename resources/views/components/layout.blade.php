<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 text-slate-900">
    <header class="bg-slate-800 text-white shadow-lg">
        <nav class="container mx-auto p-4 flex justify-between">
            <a href="/" class="text-lg font-bold">Home</a>
            <div class="flex items-center gap-4">
                @guest
                    <a href="/login" class="nav-link text-white hover:text-slate-300">Login</a> 
                    <a href="/register" class="nav-link text-white hover:text-slate-300">Register</a>
                    
                    
                @endguest

                @auth

                <a href="/{{ auth()->user()->id }}/posts" class="nav-link text-white hover:text-slate-300">Profile</a>
                <a href="{{ route('posts.create') }}" class="nav-link text-white hover:text-slate-300">Create Post</a>
                    <form action="{{ route('logout') }}" method="post" class="flex items-center">
                        @csrf
                        <button class="block pl-4 pr-8 py-2 mb-1 text-white hover:text-slate-300">Logout</button>
                    </form>
                    
                @endauth
            </div>
        </nav>
    </header>
    <main class="container mx-auto p-4 mt-6">
        {{ $slot }}
    </main>
    
</body>
</html>