<x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>

    <div class="ml-64 p-8">
        <div class="max-w-2xl mx-auto">
            <!-- Header Section -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 leading-tight">
                    {{ __('Input User') }}
                </h2>
                <p class="mt-2 text-gray-600">Create a new user account with specific role</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <form method="POST" action="{{ route('admin.store') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div class="space-y-2">
                        <x-input-label for="name" :value="__('Name')" class="text-gray-700 text-sm font-semibold"/>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            </div>
                            <x-text-input id="name" 
                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                type="text" 
                                name="name" 
                                :value="old('name')" 
                                required 
                                autofocus 
                                autocomplete="name" 
                                placeholder="Enter user's full name"/>
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-600" />
                    </div>

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <x-input-label for="email" :value="__('Email')" class="text-gray-700 text-sm font-semibold"/>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            </div>
                            <x-text-input id="email" 
                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autocomplete="username" 
                                placeholder="user@example.com"/>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
                    </div>

                    <!-- Role Selection -->
                    <div class="space-y-2">
                        <x-input-label for="role" :value="__('Role')" class="text-gray-700 text-sm font-semibold"/>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <select id="role" 
                                    name="role" 
                                    class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                    required>
                                <option value="employer">Employer</option>
                                <option value="job_seeker">Job Seeker</option>
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('role')" class="mt-1 text-sm text-red-600" />
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <x-input-label for="password" :value="__('Password')" class="text-gray-700 text-sm font-semibold"/>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            </div>
                            <x-text-input id="password" 
                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="new-password" 
                                placeholder="Enter password"/>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 text-sm font-semibold"/>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            </div>
                            <x-text-input id="password_confirmation" 
                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                type="password" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password" 
                                placeholder="Confirm password"/>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-600" />
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-6">
                        <x-primary-button class="px-6 py-3 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- <x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>

    <div class="ml-64 mt-10">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight p-3">
            {{ __('Input User') }}
        </h2>

        <form method="POST" action="{{ route('admin.store') }}" class="ml-64 mt-10">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Role -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('Role')" />
                <select id="role" name="role" class="block mt-1 w-full" required>
                    <option value="employer">Employer</option>
                    <option value="job_seeker">Job Seeker</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout> --}}