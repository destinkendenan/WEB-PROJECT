<x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>

    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-md rounded-lg p-8">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight mb-6 border-b pb-3">
            {{ __('Edit Job Post') }}
        </h2>

        <form method="POST" action="{{ route('job_posts.update', $jobPost->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Job Title -->
                <div>
                    <x-input-label for="title" :value="__('Job Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $jobPost->title)" required autofocus autocomplete="title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Location -->
                <div>
                    <x-input-label for="location" :value="__('Location')" />
                    <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location', $jobPost->location)" required autocomplete="location" />
                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                </div>

                <!-- Job Type -->
                <div>
                    <x-input-label for="job_type" :value="__('Job Type')" />
                    <select id="job_type" name="job_type" class="block mt-1 w-full border-gray-300 rounded-lg">
                        <option value="full-time" {{ old('job_type', $jobPost->job_type) == 'full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="part-time" {{ old('job_type', $jobPost->job_type) == 'part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="freelance" {{ old('job_type', $jobPost->job_type) == 'freelance' ? 'selected' : '' }}>Freelance</option>
                    </select>
                    <x-input-error :messages="$errors->get('job_type')" class="mt-2" />
                </div>

                <!-- Employer Profile -->
                <div>
                    <x-input-label for="employer_id" :value="__('Company')" />
                    <input type="hidden" name="employer_id" value="{{ $employerProfiles->id }}">
                    <x-text-input id="company_name" class="block mt-1 w-full bg-gray-100" type="text" :value="$employerProfiles->company_name" readonly />
                    <x-input-error :messages="$errors->get('employer_id')" class="mt-2" />
                </div>

                <!-- Contact Email -->
                <div>
                    <x-input-label for="contact_email" :value="__('Contact Email')" />
                    <x-text-input id="contact_email" class="block mt-1 w-full" type="email" name="contact_email" :value="old('contact_email', $jobPost->contact_email)" required autocomplete="contact_email" />
                    <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                </div>

                <!-- Contact Phone -->
                <div>
                    <x-input-label for="contact_phone" :value="__('Contact Phone')" />
                    <x-text-input id="contact_phone" class="block mt-1 w-full" type="text" name="contact_phone" :value="old('contact_phone', $jobPost->contact_phone)" required autocomplete="contact_phone" />
                    <x-input-error :messages="$errors->get('contact_phone')" class="mt-2" />
                </div>

                <!-- Salary -->
                <div>
                    <x-input-label for="salary" :value="__('Salary')" />
                    <x-text-input id="salary" class="block mt-1 w-full" type="text" name="salary" :value="old('salary', $jobPost->salary)" required autocomplete="salary" />
                    <x-input-error :messages="$errors->get('salary')" class="mt-2" />
                </div>

                <!-- Status -->
                <div>
                    <x-input-label for="status" :value="__('Status')" />
                    <select id="status" name="status" class="block mt-1 w-full border-gray-300 rounded-lg">
                        <option value="active" {{ old('status', $jobPost->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="closed" {{ old('status', $jobPost->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                        <option value="draft" {{ old('status', $jobPost->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
            </div>

            <!-- Description -->
            <div class="mt-6">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" class="block mt-1 w-full border-gray-300 rounded-lg" name="description" required>{{ old('description', $jobPost->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Requirements -->
            <div class="mt-6">
                <x-input-label for="requirements" :value="__('Requirements')" />
                <textarea id="requirements" class="block mt-1 w-full border-gray-300 rounded-lg" name="requirements" required>{{ old('requirements', $jobPost->requirements) }}</textarea>
                <x-input-error :messages="$errors->get('requirements')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
