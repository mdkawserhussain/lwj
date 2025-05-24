<x-layout>
    <h1 class="text-2xl font-bold mb-2 mt-2 text-center">Create a Post</h1>

    <form action="/posts" method="POST" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <input type="text" name="title" placeholder="Title"
                class="w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
        </div>
        <div class="mb-4">
            <textarea name="body" placeholder="Body"
                class="w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent"
                rows="5"></textarea>
        </div>
        <div class="text-center">
            <button type="submit"
                class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>

        </div>
    </form>

</x-layout>
