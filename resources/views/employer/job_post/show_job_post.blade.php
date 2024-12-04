<x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 my-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-800">Job Details</h2>
            <span class="bg-green-100 text-green-800 px-3 py-1 text-sm rounded-full">
                {{ $job->status}}
            </span>
        </div>

        <div class="mt-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Company Name -->
                <div>
                    <p class="text-gray-500 text-sm">Company Name</p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $job->employer ? $job->employer->company_name : 'Company not found' }}
                    </p>
                </div>

                <!-- Job Title -->
                <div>
                    <p class="text-gray-500 text-sm">Title</p>
                    <p class="text-lg font-semibold text-gray-700">{{ $job->title }}</p>
                </div>

                <!-- Location -->
                <div>
                    <p class="text-gray-500 text-sm">Location</p>
                    <p class="text-lg font-semibold text-gray-700">{{ $job->location }}</p>
                </div>

                <!-- Job Type -->
                <div>
                    <p class="text-gray-500 text-sm">Job Type</p>
                    <p class="text-lg font-semibold text-gray-700">{{ $job->job_type }}</p>
                </div>

                <!-- Contact Email -->
                <div>
                    <p class="text-gray-500 text-sm">Contact Email</p>
                    <p class="text-lg font-semibold text-gray-700">{{ $job->contact_email }}</p>
                </div>

                <!-- Contact Phone -->
                <div>
                    <p class="text-gray-500 text-sm">Contact Phone</p>
                    <p class="text-lg font-semibold text-gray-700">{{ $job->contact_phone }}</p>
                </div>

                <!-- Description -->
                <div class="col-span-2">
                    <p class="text-gray-500 text-sm">Job Description</p>
                    <p class="text-lg font-semibold text-gray-700">{{ $job->description }}</p>
                </div>

                <!-- Requirements -->
                <div class="col-span-2">
                    <p class="text-gray-500 text-sm">Requirements</p>
                    <ul class="list-disc pl-5 text-lg font-semibold text-gray-700 space-y-2">
                        @foreach (explode(',', $job->requirements) as $requirement)
                            <li>{{ $requirement }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Salary -->
                <div>
                    <p class="text-gray-500 text-sm">Salary</p>
                    <p class="text-lg font-semibold text-gray-700">{{ $job->salary }}</p>
                </div>

                <!-- Status -->
                <div>
                    <p class="text-gray-500 text-sm">Status</p>
                    <p class="text-lg font-semibold text-gray-700">{{ $job->status }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            @if (Auth::user()->role === 'employer')
            <a href="{{ route('job_posts.edit', $job->id) }}" class="bg-yellow-500 text-white px-6 py-2 rounded-full hover:bg-yellow-600 transition duration-200 mr-2">
                Edit
            </a>
            @elseif (Auth::user()->role === 'job_seeker')
            {{-- <button class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition duration-200">
                Apply Now
            </button> --}}
                

            <a href="{{ route('applied_jobs.create', $job->id) }}" class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition duration-200">
                Apply Now
            </a>
            @endif
        </div>
    </div>
</x-app-layout>
