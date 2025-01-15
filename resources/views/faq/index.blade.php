<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
