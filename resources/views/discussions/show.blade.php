<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $discussion->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Discussion Content -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        By: {{ $discussion->user->name ?? 'Unknown User' }} | {{ $discussion->created_at->format('d M Y') }}
                    </p>
                    <div class="mb-6">
                        {{ $discussion->content }}
                    </div>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Replies Section -->
                    <h3 class="text-lg font-semibold mb-4 mt-6">Replies</h3>

                    @forelse ($discussion->replies as $reply)
                        <div class="mb-4 border border-gray-300 rounded-md p-4 bg-gray-50 dark:bg-gray-700">
                            <p class="font-medium text-gray-800 dark:text-gray-200">
                                {{ $reply->user->name ?? 'Deleted User' }}
                            </p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $reply->content }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-500">
                                {{ $reply->created_at->diffForHumans() }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-600 dark:text-gray-400">No replies yet. Be the first to reply!</p>
                    @endforelse

                    <!-- Reply Form -->
                    @if (auth()->check())
                        <form action="{{ route('replies.store', $discussion->id) }}" method="POST" class="mt-6">
                            @csrf
                            <textarea 
                                name="content" 
                                rows="3" 
                                class="w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200" 
                                placeholder="Add your reply..."></textarea>
                            <button type="submit" class="mt-2 bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">Reply</button>
                        </form>
                    @else
                        <p class="text-gray-600 dark:text-gray-400 mt-4">
                            Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">log in</a> to add a reply.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
