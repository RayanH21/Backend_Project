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
                        <!-- Link naar de discussie -->
                        <a href="{{ route('discussions.show', $discussion->id) }}" class="text-blue-500 hover:underline">
                            {{ $discussion->title }}
                        </a>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            By: 
                            <!-- Link naar het profiel van de gebruiker -->
                            @if($discussion->author)
                                <a href="{{ route('profile.show', $discussion->author->id) }}" class="text-blue-500 hover:underline">
                                    {{ $discussion->author->username ?? 'Unknown Username' }}
                                </a>
                            @else
                                Unknown Author
                            @endif
                            | {{ $discussion->created_at->format('d M Y') }}
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
            <li class="mb-2">Season 15 Patch Notes Released!</li>
            <li class="mb-2">Top 5 Builds for ADC in Season 15</li>
            <li class="mb-2">Atakhan Revealed</li>
        </ul>
        <a href="{{ route('news.index') }}" class="text-blue-500 hover:underline mt-4 block">View all news</a>
    </div>
</div>


    <footer class="bg-black text-black py-6">
        <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <div class="space-x-6">
                    <a href="{{ route('faq.index') }}" class="hover:text-gray-400 text-xl transition">{{ __('FAQ') }}</a>
                    <a href="{{ route('contact.index') }}" class="hover:text-gray-400 text-xl transition">{{ __('Contact') }}</a>
                </div>
                <div>
                    <p class="text-sm text-gray-500">{{ __('© 2025 Your Company. All rights reserved.') }}</p>
                </div>
            </div>
        </div>

    </footer>
    
    

</x-app-layout>
