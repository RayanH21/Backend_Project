<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Discussions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Zoekfunctionaliteit -->
            <form method="GET" action="{{ route('discussions.index') }}" class="mb-6">
                <input type="text" name="search" placeholder="Search discussions..."
                    value="{{ request('search') }}"
                    class="border rounded-lg px-4 py-2 w-full">
            </form>

            <!-- Button voor nieuwe discussie -->
            <div class="mb-4">
                <a href="{{ route('discussions.create') }}" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Start a New Discussion
                </a>
            </div>

            <!-- Discussions Lijst -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($discussions->isEmpty())
                        <p>No discussions found.</p>
                    @else
                        <ul>
                            @foreach ($discussions as $discussion)
                                <li class="mb-4">
                                    <a href="{{ route('discussions.show', $discussion->id) }}" 
                                        class="text-blue-500 hover:underline">
                                        {{ $discussion->title }}
                                    </a>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        By {{ $discussion->author->name ?? 'Unknown' }} | 
                                        {{ $discussion->created_at->format('d M Y') }}
                                    </p>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Paginatie -->
                        <div class="mt-6">
                            {{ $discussions->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
