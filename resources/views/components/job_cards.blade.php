<div id="jobs" class="container mx-auto">
    <!-- Section Title -->
    <div class="px-6 pt-8 pb-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900">Available Jobs</h2>
        <div class="mt-1 h-1 w-20 bg-blue-600 rounded mx-auto"></div>
    </div>

    <!-- Job Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        @foreach ($jobPosts as $jobPost)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                <!-- Card Header with Job Type Badge -->
                <div class="p-5 border-b border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-bold text-gray-800 hover:text-blue-600 transition-colors duration-300">
                            {{ $jobPost->title }}
                        </h3>
                        <span class="px-3 py-1 text-xs font-semibold bg-blue-50 text-blue-600 rounded-full">
                            {{ $jobPost->job_type }}
                        </span>
                    </div>
                    
                    <!-- Company and Location Info -->
                    <div class="space-y-2">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-4 h-4 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <p class="text-sm">{{ $jobPost->employer->company_name }}</p>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-4 h-4 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <p class="text-sm">{{ $jobPost->location }}</p>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-4 h-4 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 10c-2.21 0-4-1.79-4-4h2c0 1.1.9 2 2 2s2-.9 2-2h2c0 2.21-1.79 4-4 4z" />
                            </svg>
                            <p class="text-sm">{{ $jobPost->salary }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Actions -->
                <div class="p-5 bg-gray-50 flex justify-between items-center gap-4">
                    <a href="{{ route('job_posts.show', $jobPost->id) }}" 
                       class="inline-flex items-center px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition-colors duration-300 flex-1 justify-center">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>