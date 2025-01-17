<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <!-- Gebruikersnaam -->
                        <h3 class="text-3xl font-extrabold">{{ $user->name }}</h3>
                    </div>

                    <div class="space-y-6">
                        <!-- Profielfoto -->
                        <div class="flex justify-center">
                            <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/default-profile.png') }}"
                                alt="{{ $user->name }}"
                                class="w-32 h-32 rounded-full object-cover shadow-md">
                        </div>

                        <!-- Gebruikersinformatie -->
                        <div class="text-center space-y-4">
                            <!-- Birthday -->
                            <p class="text-lg">
                                <strong>Birthday:</strong> {{ $user->birthday ? $user->birthday->format('d M Y') : 'Not Provided' }}
                            </p>
                            
                            <!-- About Me -->
                            <p class="text-lg">
                                <strong>About Me:</strong> {{ $user->about_me ? $user->about_me : 'No description provided.' }}
                            </p>
                        </div>

                        <!-- Admin-opties (optioneel, alleen zichtbaar voor admin) -->
                        @auth
                            @if(auth()->user()->is_admin)
                                <div class="flex justify-end space-x-4 mt-6">
                                    <a href="{{ route('profile.edit', $user->id) }}" class="bg-blue-100 text-blue-700 font-bold py-2 px-4 rounded-md hover:bg-blue-200">
                                        Edit Profile
                                    </a>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
