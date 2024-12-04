<x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>

    <div class="ml-64 mt-10">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight p-3">
            {{ __('Edit Job Seeker Profile') }}
        </h2>

        <form method="POST" action="{{ route('job_seekers.update_profile', $jobSeekerProfile->id) }}" class="ml-64 mt-10" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Full Name -->
            <div>
                <x-input-label for="full_name" :value="__('Full Name')" />
                <x-text-input id="full_name" class="block mt-1 w-full" type="text" name="full_name" :value="old('full_name', $jobSeekerProfile->full_name)" required autofocus autocomplete="full_name" />
                <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
            </div>

            <!-- Date of Birth -->
            <div class="mt-4">
                <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth', $jobSeekerProfile->date_of_birth)" required autocomplete="date_of_birth" />
                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" name="gender" class="block mt-1 w-full" required>
                    <option value="male" {{ old('gender', $jobSeekerProfile->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $jobSeekerProfile->gender) == 'female' ? 'selected' : '' }}>Female</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $jobSeekerProfile->phone)" required autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $jobSeekerProfile->address)" required autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Bio -->
            <div class="mt-4">
                <x-input-label for="bio" :value="__('Bio')" />
                <textarea id="bio" class="block mt-1 w-full" name="bio" required>{{ old('bio', $jobSeekerProfile->bio) }}</textarea>
                <x-input-error :messages="$errors->get('bio')" class="mt-2" />
            </div>

            <!-- CV -->
            <div class="mt-4">
                <x-input-label for="cv" :value="__('CV')" />
                <input id="cv" class="block mt-1 w-full" type="file" name="cv" accept=".pdf" />
                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
                @if (isset($jobSeekerProfile) && $jobSeekerProfile->cv)
                    <a href="{{ asset('storage/' . $jobSeekerProfile->cv) }}" target="_blank" class="text-blue-500 underline mt-2">View Current CV</a>
                @endif
            </div>

            <!-- Skills -->
            <div class="mt-4">
                <x-input-label for="skills" :value="__('Skills')" />
                <div id="skills-container">
                    @foreach ($jobSeekerProfile->skills as $index => $skill)
                        <x-text-input id="skills" class="block mt-1 w-full" type="text" name="skills[]" :value="old('skills.' . $index, $skill->skill_name)" required autocomplete="skills" />
                    @endforeach
                </div>
                <button type="button" id="add-skill" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Add Skill</button>
                <x-input-error :messages="$errors->get('skills')" class="mt-2" />
            </div>
            

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </div>

    <script>
        function addSkillField() {
            const container = document.getElementById('skills-container');
            const newField = document.createElement('div');
            newField.innerHTML = `
                <div class="mt-4">
                    <x-text-input name="skills[]" class="block mt-1 w-full" type="text" required />
                    <button type="button" onclick="removeSkillField(this)" class="mt-2 text-red-500 hover:underline">Remove</button>
                </div>
            `;
            container.appendChild(newField);
        }
    
        function removeSkillField(button) {
            button.parentElement.remove();
        }
    </script>

    <script>
        document.getElementById('add-skill').addEventListener('click', function() {
            var container = document.getElementById('skills-container');
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'skills[]';
            input.className = 'block mt-1 w-full';
            input.required = true;
            container.appendChild(input);
        });
    </script>
    
</x-app-layout>