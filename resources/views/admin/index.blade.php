<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('FAQ Beheer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Toevoegen -->
            <form method="POST" action="{{ route('admin.faq.store') }}">
                @csrf
                <input type="text" name="question" placeholder="Vraag" required class="w-full mb-2">
                <textarea name="answer" placeholder="Antwoord" required class="w-full mb-2"></textarea>
                <select name="category_id" required class="w-full mb-2">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Voeg FAQ toe</button>
            </form>

            <!-- Lijst van bestaande FAQ's -->
            <div class="mt-6">
                @foreach ($faqs as $faq)
                    <div class="mb-4 border p-4">
                        <h4 class="font-bold">{{ $faq->question }}</h4>
                        <p>{{ $faq->answer }}</p>
                        <form method="POST" action="{{ route('admin.faq.destroy', $faq) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Verwijder</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
