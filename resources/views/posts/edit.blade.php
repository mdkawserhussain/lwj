<x-layout>

    <h1 class="text-2xl font-bold mb-2 mt-2 text-center">Edit a Post</h1>
    <form action="{{ route('posts.update', $post) }}" method="POST" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <input type="text" name="title" value="{{ $post->title }}" placeholder="Title" class="w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
        </div>
        <div class="mb-4">
            <textarea name="body" placeholder="Body" class="w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent" rows="5">{{ $post->body }}</textarea>
        </div>
        <div class="text-center">
            <button type="submit" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>

        </div>    
    </form>
    <div class="flex justify-center">
        <a href="/posts/{{ $post->id }}" class="text-slate-900 hover:text-slate-500">
            <h2 class="text-3xl font-bold">Back to Post</h2>
        </a>
    </div>




</x-layout>