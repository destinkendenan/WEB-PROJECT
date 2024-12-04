<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (Auth::check() && Auth::user()->role === 'admin')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Employer Count Card -->
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <div class="text-center">
                            <div class="flex justify-center items-center mb-4">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="ml-2 text-xl font-bold text-gray-800">Employers</h3>
                            </div>
                            <p class="text-4xl font-bold text-gray-800">{{ $employerCount }}</p>
                            <p class="text-sm text-gray-500 mt-2">All registered employers</p>
                        </div>
                    </div>
                
                    <!-- Job Seeker Count Card -->
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <div class="text-center">
                            <div class="flex justify-center items-center mb-4">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="ml-2 text-xl font-bold text-gray-800">Job Seekers</h3>
                            </div>
                            <p class="text-4xl font-bold text-gray-800">{{ $jobSeekerCount }}</p>
                            <p class="text-sm text-gray-500 mt-2">All registered job seekers</p>
                        </div>
                    </div>
                
                    <!-- Applicant Count Card -->
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <div class="text-center">
                            <div class="flex justify-center items-center mb-4">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M10 2a3 3 0 0 0-3 3v1H5a3 3 0 0 0-3 3v2.382l1.447.723.005.003.027.013.12.056c.108.05.272.123.486.212.429.177 1.056.416 1.834.655C7.481 13.524 9.63 14 12 14c2.372 0 4.52-.475 6.08-.956.78-.24 1.406-.478 1.835-.655a14.028 14.028 0 0 0 .606-.268l.027-.013.005-.002L22 11.381V9a3 3 0 0 0-3-3h-2V5a3 3 0 0 0-3-3h-4Zm5 4V5a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1h6Zm6.447 7.894.553-.276V19a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-5.382l.553.276.002.002.004.002.013.006.041.02.151.07c.13.06.318.144.557.242.478.198 1.163.46 2.01.72C7.019 15.476 9.37 16 12 16c2.628 0 4.98-.525 6.67-1.044a22.95 22.95 0 0 0 2.01-.72 15.994 15.994 0 0 0 .707-.312l.041-.02.013-.006.004-.002.001-.001-.431-.866.432.865ZM12 10a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="ml-2 text-xl font-bold text-gray-800">Applicants</h3>
                            </div>
                            <p class="text-4xl font-bold text-gray-800">{{ $applicantCount }}</p>
                            <p class="text-sm text-gray-500 mt-2">All applicants</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    @elseif (Auth::check() && Auth::user()->role === 'employer')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Job Post Count Card -->
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <div class="text-center">
                            <div class="flex justify-center items-center mb-4">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M10 2a3 3 0 0 0-3 3v1H5a3 3 0 0 0-3 3v2.382l1.447.723.005.003.027.013.12.056c.108.05.272.123.486.212.429.177 1.056.416 1.834.655C7.481 13.524 9.63 14 12 14c2.372 0 4.52-.475 6.08-.956.78-.24 1.406-.478 1.835-.655a14.028 14.028 0 0 0 .606-.268l.027-.013.005-.002L22 11.381V9a3 3 0 0 0-3-3h-2V5a3 3 0 0 0-3-3h-4Zm5 4V5a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1h6Zm6.447 7.894.553-.276V19a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-5.382l.553.276.002.002.004.002.013.006.041.02.151.07c.13.06.318.144.557.242.478.198 1.163.46 2.01.72C7.019 15.476 9.37 16 12 16c2.628 0 4.98-.525 6.67-1.044a22.95 22.95 0 0 0 2.01-.72 15.994 15.994 0 0 0 .707-.312l.041-.02.013-.006.004-.002.001-.001-.431-.866.432.865ZM12 10a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="ml-2 text-xl font-bold text-gray-800">Job Posts</h3>
                            </div>
                            <p class="text-4xl font-bold text-gray-800">{{ $jobPostCount }}</p>
                            <p class="text-sm text-gray-500 mt-2">All job posts</p>
                        </div>
                    </div>
                    <!-- Applicant Count Card -->
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <div class="text-center">
                            <div class="flex justify-center items-center mb-4">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="ml-2 text-xl font-bold text-gray-800">Applicants</h3>
                            </div>
                            <p class="text-4xl font-bold text-gray-800">{{ $applicantCount }}</p>
                            <p class="text-sm text-gray-500 mt-2">All applicants this month</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif (Auth::check() && Auth::user()->role === 'job_seeker')
        
    @endif
</x-app-layout>