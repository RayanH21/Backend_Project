<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Latest News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-3xl font-extrabold">News</h3>
                        
                        <!-- Alleen zichtbaar voor admins -->
                        @auth
                            @if(auth()->user()->is_admin)
                                <a href="{{ route('news.create') }}" class="bg-blue-100 text-blue-700 font-bold py-2 px-4 rounded-md hover:bg-blue-200">
                                    Add News
                                </a>
                            @endif
                        @endauth
                    </div>

                    <ul class="space-y-16"> <!-- Extra spatie tussen nieuwsitems -->
                        @foreach ($newsItems as $news)
                            <li class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                                <!-- Titel -->
                                <h4 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">{{ $news->title }}</h4>
                                
                                <!-- Afbeelding -->
                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-3/4 h-auto max-h-60 object-cover rounded-lg shadow-md mb-4">

                                <!-- Content -->
                                <p class="text-gray-700 dark:text-gray-300">
                                    {{ $news->content }}
                                </p>
                                
                                <!-- Publicatiedatum -->
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-4">
                                    Published on: {{ $news->published_at->format('d M Y') }}
                                </p>

                                <!-- Admin-opties -->
                                @auth
                                    @if(auth()->user()->is_admin)
                                        <div class="mt-6 flex items-center space-x-4">
                                            <a href="{{ route('news.edit', $news->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                            <form action="{{ route('news.destroy', $news->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    class="text-red-500 hover:underline"
                                                    onclick="return confirm('Are you sure you want to delete this news item?');">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </li>
                        @endforeach
                    </ul>

                    <!-- Paginatie -->
                    <div class="mt-6">
                        {{ $newsItems->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
