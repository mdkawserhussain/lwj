<x-layout>
    <h1 class="text-2xl font-bold mb-2 text-center">Posts</h1>

    @foreach ($posts as $post)
        <div class="mb-4 p-4 bg-white rounded-md shadow-lg">
            <a href="{{ route('posts.show', $post) }}" class="text-slate-900 hover:text-slate-500">
                <h2 class="text-2xl font-bold">{{ $post->title }}</h2>
            </a>

            <p class="text-slate-500">{{ $post->body }}</p>

            <div class="flex gap-2">
                <p class="font-bold">Posted {{ $post->created_at->diffForHumans() }}</p>

                <p>by
                    <a href="{{ route('users.posts', $post->user) }}" class="text-blue-500 hover:text-blue-900">
                        {{ $post->user->name }}
                    </a>
                </p>
            </div>
        </div>
    @endforeach
    {{ $posts->links() }}

</x-layout>

