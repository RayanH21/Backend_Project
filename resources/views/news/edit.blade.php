<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="w-full border rounded-md p-2" value="{{ $news->title }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="image" id="image" class="w-full border rounded-md p-2">
                            @if ($news->image)
                                <img src="{{ asset('storage/' . $news->image) }}" alt="News Image" class="mt-2 rounded-md shadow-md w-48">
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="content" id="content" class="w-full border rounded-md p-2" rows="5" required>{{ $news->content }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="published_at" class="block text-sm font-medium text-gray-700">Publish Date</label>
                            <input type="date" name="published_at" id="published_at" class="w-full border rounded-md p-2" value="{{ $news->published_at->format('Y-m-d') }}" required>
                        </div>

                        <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
