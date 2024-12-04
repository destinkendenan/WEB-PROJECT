<x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Edit User') }}
                    </h2>

                    <form method="POST" action="{{ route('admin.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Username -->
                        <div class="mt-4">
                            <x-label for="username" :value="__('Username')" />
                            <x-input id="username" class="block mt-1 w-full" type="text" name="username" value="{{ $user->name }}" required autofocus />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password (leave blank to keep current password)')" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
                        </div>

                        <!-- Role -->
                        <div class="mt-4">
                            <x-label for="role" :value="__('Role')" />
                            <select id="role" name="role" class="block mt-1 w-full" required>
                                <option value="Pelamar" {{ $user->role == 'Pelamar' ? 'selected' : '' }}>{{ __('Pelamar') }}</option>
                                <option value="Penyedia Lamaran" {{ $user->role == 'Penyedia Lamaran' ? 'selected' : '' }}>{{ __('Penyedia Lamaran') }}</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>