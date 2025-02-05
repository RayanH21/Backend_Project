<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @auth
                @if (auth()->user()->is_admin) 
                    <!-- Admin sectie: Toevoegen van nieuwe FAQ -->
                    <div class="mb-4 text-right">
                        <a href="{{ route('faqs.create') }}" class="inline-block bg-blue-500 text-black font-bold py-3 px-6 rounded-lg shadow-md hover:bg-blue-600 transition">
                            {{ __('Add FAQ') }}
                        </a>
                    </div>
                @endif
            @endauth

            @if ($faqs->isEmpty())
                <p class="text-gray-500 dark:text-gray-400">No FAQs available at the moment.</p>
            @else
                @foreach ($faqs as $category)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h3 class="text-lg font-semibold mb-4">{{ $category->name }}</h3>
                            @if ($category->faqs->isEmpty())
                                <p class="text-sm text-gray-500 dark:text-gray-400">No FAQs available for this category.</p>
                            @else
                                <ul>
                                    @foreach ($category->faqs as $faq)
                                        <li class="mb-4">
                                            <p class="font-bold">{{ $faq->question }}</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $faq->answer }}</p>
                                            
                                            @auth
                                                @if (auth()->user()->is_admin)
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('faqs.edit', $faq->id) }}" class="text-blue-500 hover:text-blue-700 text-sm mr-2">
                                                        Edit
                                                    </a>

                                                    <!-- Delete Button with Confirmation -->
                                                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this FAQ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
