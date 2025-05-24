<x-layout>
    <div class="m-4">
        <a href="" class="text-slate-900 hover:text-slate-500">
            <h2 class="text-3xl font-bold">{{ $post->title }}</h2>
        </a>
        <p class="text-slate-500">{{ $post->body }}</p>
    </div>
    @auth
        <div class="flex justify-start mt-6">
            <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md mx-4"
                href="{{ route('posts.edit', $post) }}">Edit Post</a>
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md">Delete Post</button>
            </form>
        </div>
    @endauth
</x-layout>
