<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Profile Information</h3>
                    
                    <!-- Profielafbeelding -->
                    @if ($user->profile_photo)
                        <div class="mb-4">
                            <p><strong>Profile Photo:</strong></p>
                            <div class="w-20 h-20 rounded-full mr-4 overflow-hidden bg-gray-100">
                                <img 
                                    src="{{ asset('storage/' . $user->profile_photo) }}" 
                                    alt="Profile Photo" 
                                    class="object-contain w-full h-full">
                            </div>
                        </div>
                    @else
                        <p>No profile photo uploaded.</p>
                    @endif
                    
                    <!-- Gebruikersinformatie -->
                    <p><strong>Username:</strong> {{ $user->username ?? 'Not set' }}</p>
                    <p><strong>Birthdate:</strong> {{ $user->birthdate ? \Carbon\Carbon::parse($user->birthdate)->format('d-m-Y') : 'Not set' }}</p>
                    <p><strong>About Me:</strong> {{ $user->about_me ?? 'Not set' }}</p>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">Edit Profile</a>
        </div>
    </div>
</x-app-layout>
