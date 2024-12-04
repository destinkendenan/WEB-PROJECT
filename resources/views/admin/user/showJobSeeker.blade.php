<x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>
    
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">

            <!-- Profile Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Profile Header -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white">
                        {{ $jobSeeker->full_name }}'s Profile
                    </h2>
                </div>

                <!-- Profile Content -->
                <div class="p-6">
                    <!-- Basic Info Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">Full Name</p>
                                <p class="text-gray-800 font-medium">{{ $jobSeeker->full_name }}</p>
                            </div>

                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">Date of Birth</p>
                                <p class="text-gray-800 font-medium">{{ \Carbon\Carbon::parse($jobSeeker->date_of_birth)->format('d M Y') }}</p>
                            </div>

                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">Gender</p>
                                <p class="text-gray-800 font-medium">{{ ucfirst($jobSeeker->gender) }}</p>
                            </div>

                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">Phone</p>
                                <p class="text-gray-800 font-medium">{{ $jobSeeker->phone }}</p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">Address</p>
                                <p class="text-gray-800 font-medium">{{ $jobSeeker->address }}</p>
                            </div>

                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">Bio</p>
                                <p class="text-gray-800 font-medium">{{ $jobSeeker->bio }}</p>
                            </div>

                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">CV</p>
                                @if($jobSeeker->cv)
                                    <a href="{{ asset('storage/cvs/' . $jobSeeker->cv) }}" 
                                       target="_blank" 
                                       class="text-blue-600 hover:text-blue-800 font-medium">
                                        Download CV
                                    </a>
                                @else
                                    <p class="text-gray-800">No CV Uploaded</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="bg-gray-50 px-6 py-4 flex justify-end">
                    <a href="{{ route('jobseekers.edit', $jobSeeker->id) }}" 
                       class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition ease-in-out duration-150">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
