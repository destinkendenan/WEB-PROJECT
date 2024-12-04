<x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>

    <div class="ml-64 mt-10">
        <a href="{{ route('job_posts.create') }}"><h2 class="font-semibold text-xl text-gray-800 leading-tight p-3">
            {{ __('Create Job Post') }}
        </h2></a>

        <form method="POST" action="{{ route('job_posts.store') }}" class="ml-64 mt-10">
            @csrf

            <!-- Job Title -->
            <div>
                <x-input-label for="title" :value="__('Job Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Location -->
            <div class="mt-4">
                <x-input-label for="location" :value="__('Location')" />
                <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autocomplete="location" />
                <x-input-error :messages="$errors->get('location')" class="mt-2" />
            </div>

            <!-- Job Type -->
            <div class="mt-4">
                <x-input-label for="job_type" :value="__('Job Type')" />
                <select id="job_type" name="job_type" class="block mt-1 w-full" required>
                    <option value="full-time">Full-time</option>
                    <option value="part-time">Part-time</option>
                    <option value="freelance">Freelance</option>
                </select>
                <x-input-error :messages="$errors->get('job_type')" class="mt-2" />
            </div>

            <!-- Company -->
            {{-- <div class="mt-4">
                <x-input-label for="employer_id" :value="__('Company')" />
                <x-text-input id="employer_id" class="block mt-1 w-full" type="text" name="employer_id" :value="$employerProfiles->company_name" readonly />
                <x-input-error :messages="$errors->get('employer_id')" class="mt-2" />
            </div> --}}
            <div class="mt-4">
                <x-input-label for="employer_id" :value="__('Company')" />
                <x-text-input id="employer_id" class="block mt-1 w-full" type="hidden" name="employer_id" :value="Auth::user()->employerProfile->id" readonly />
                <x-text-input id="company_name" class="block mt-1 w-full" type="text" :value="Auth::user()->employerProfile->company_name" readonly />
                <x-input-error :messages="$errors->get('employer_id')" class="mt-2" />
            </div>

            <!-- Contact Email -->
            <div class="mt-4">
                <x-input-label for="contact_email" :value="__('Contact Email')" />
                <x-text-input id="contact_email" class="block mt-1 w-full" type="email" name="contact_email" :value="old('contact_email')" required autocomplete="contact_email" />
                <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
            </div>

            <!-- Contact Phone -->
            <div class="mt-4">
                <x-input-label for="contact_phone" :value="__('Contact Phone')" />
                <x-text-input id="contact_phone" class="block mt-1 w-full" type="text" name="contact_phone" :value="old('contact_phone')" required autocomplete="contact_phone" />
                <x-input-error :messages="$errors->get('contact_phone')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" class="block mt-1 w-full" name="description" required>{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Requirements -->
            <div class="mt-4">
                <x-input-label for="requirements" :value="__('Requirements')" />
                <textarea id="requirements" class="block mt-1 w-full" name="requirements" required>{{ old('requirements') }}</textarea>
                <x-input-error :messages="$errors->get('requirements')" class="mt-2" />
            </div>

            <!-- Salary -->
            <div class="mt-4">
                <x-input-label for="salary" :value="__('Salary')" />
                <x-text-input id="salary" class="block mt-1 w-full" type="text" name="salary" :value="old('salary')" required autocomplete="salary" />
                <x-input-error :messages="$errors->get('salary')" class="mt-2" />
            </div>

            <!-- Status -->
            <div class="mt-4">
                <x-input-label for="status" :value="__('Status')" />
                <select id="status" name="status" class="block mt-1 w-full" required>
                    <option value="active">Active</option>
                    <option value="closed">Closed</option>
                    <option value="draft">Draft</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>