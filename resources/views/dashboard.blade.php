<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welkomstbericht -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome back!") }}
                </div>
            </div>

            <!-- Last Patch Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Last Patch</h3>
                    <img src="{{ asset('images/last_patch.jpg') }}" alt="Last Patch" class="rounded-lg shadow-md mb-4">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Discover the latest changes in the game with the newest patch. Check out the updates for champions, items, and systems.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Discussions -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h3 class="text-lg font-semibold mb-4">Recent Discussions</h3>
            <ul>
                @foreach ($discussions as $discussion)
                    <li class="mb-2">
                        <a href="{{ route('discussions.show', $discussion->id) }}" class="text-blue-500 hover:underline">
                            {{ $discussion->title }}
                        </a>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            By: {{ $discussion->author ? $discussion->author->name : 'Unknown Author' }} | {{ $discussion->created_at->format('d M Y') }}
                        </p>
                        
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('discussions.index') }}" class="text-blue-500 hover:underline mt-4 block">
                View all discussions
            </a>
        </div>
    </div>
    
    
    
    <!-- Latest News -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h3 class="text-lg font-semibold mb-4">Latest News</h3>
            <ul>
                <li class="mb-2">
                    <a href="#" class="text-blue-500 hover:underline">Season 15 Patch Notes Released!</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-blue-500 hover:underline">Top 5 Builds for ADC in Season 15</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-blue-500 hover:underline">Atakhan Revealed</a>
                </li>
            </ul>
            <a href="#" class="text-blue-500 hover:underline mt-4 block">View all news</a>
        </div>
    </div>
    
    <!-- Admin Panel -->
    @if (Auth::user() && Auth::user()->is_admin)
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h3 class="text-lg font-semibold mb-4">Admin Panel</h3>
                <p>You have admin rights. Go to the 
                    <a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:underline">Admin Dashboard</a>.
                </p>
            </div>
        </div>
    @endif

</x-app-layout>
