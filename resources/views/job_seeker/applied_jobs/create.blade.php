<!-- resources/views/job_applications/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apply for Job') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('applied_jobs.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Job Post ID -->
                    <input type="hidden" name="job_post_id" value="{{ $jobPost->id }}">

                    <!-- CV -->
                    <div class="mt-4">
                        <x-input-label for="cv" :value="__('CV')" />
                        <x-text-input id="cv" class="block mt-1 w-full" type="file" name="cv" required />
                        <x-input-error :messages="$errors->get('cv')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class="ml-4">
                            {{ __('Apply') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>