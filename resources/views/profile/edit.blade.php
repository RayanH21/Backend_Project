<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Update Profile Information -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Username -->
                        <div class="mb-6">
                            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Username') }}</label>
                            <input type="text" name="username" id="username" value="{{ old('username', Auth::user()->username) }}" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
                            @error('username')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Birthday -->
                        <div class="mb-6">
                            <label for="birthdate" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Birthday') }}</label>
                            <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', Auth::user()->birthdate) }}" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                            @error('birthdate')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Profile Picture -->
                        <div class="mb-6">
                            <label for="profile_photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Profile Photo') }}</label>
                            <input type="file" name="profile_photo" id="profile_photo" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                            @error('profile_photo')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- About Me -->
                        <div class="mb-6">
                            <label for="about_me" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('About Me') }}</label>
                            <textarea name="about_me" id="about_me" rows="4" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500">{{ old('about_me', Auth::user()->about_me) }}</textarea>
                            @error('about_me')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="inline-block bg-blue-500 text-black font-bold py-3 px-6 rounded-lg shadow-md hover:bg-blue-600 transition">
                                {{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
