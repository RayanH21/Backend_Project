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

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h3 class="text-lg font-semibold mb-4">Recent Discussions</h3>
            <ul>
                <li class="mb-2">
                    <a href="#" class="text-blue-500 hover:underline">How to build Ashe for the latest patch?</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-blue-500 hover:underline">What are the best jungle champions for solo queue?</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-blue-500 hover:underline">Tips for climbing ranked in season 15.</a>
                </li>
            </ul>
            <a href="#" class="text-blue-500 hover:underline mt-4 block">View all discussions</a>
        </div>
    </div>
    
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
    
    @if (Auth::user() && Auth::user()->is_admin)
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h3 class="text-lg font-semibold mb-4">Admin Panel</h3>
        <p>You have admin rights. Go to the <a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:underline">Admin Dashboard</a>.</p>
    </div>
</div>
@endif

    
</x-app-layout>
