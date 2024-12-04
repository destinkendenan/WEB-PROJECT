<x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>
    
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">

            <!-- Profile Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Profile Header -->
                <div class="bg-gray-800 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white">
                        {{ $user->name }}'s Profile
                    </h2>
                </div>

                <!-- Profile Content -->
                <div class="p-6">
                    <!-- Company Logo Section -->
                    <div class="mb-8 flex justify-center">
                        @if(!empty(optional($employerProfile)->logo))
                            <img src="{{ optional($employerProfile)->logo }}" 
                                 alt="Company Logo" 
                                 class="rounded-lg shadow-md max-w-[200px] h-auto"/>
                        @else
                            <div class="w-48 h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <span class="text-gray-400">No Logo Available</span>
                            </div>
                        @endif
                    </div>

                    <!-- Profile Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Basic Info Section -->
                        <div class="space-y-4">
                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">Name</p>
                                <p class="text-gray-800 font-medium">{{ $user->name }}</p>
                            </div>
                            
                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">Email</p>
                                <p class="text-gray-800 font-medium">{{ $user->email }}</p>
                            </div>

                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">Phone</p>
                                <p class="text-gray-800 font-medium">{{ optional($employerProfile)->phone ?? '-' }}</p>
                            </div>
                        </div>

                        <!-- Company Info Section -->
                        <div class="space-y-4">
                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">Company Name</p>
                                <p class="text-gray-800 font-medium">{{ optional($employerProfile)->company_name ?? '-' }}</p>
                            </div>

                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">Industry</p>
                                <p class="text-gray-800 font-medium">{{ optional($employerProfile)->industry ?? '-' }}</p>
                            </div>

                            <div class="border-b pb-3">
                                <p class="text-sm text-gray-500 mb-1">Website</p>
                                @if(!empty(optional($employerProfile)->website))
                                    <a href="{{ optional($employerProfile)->website }}" 
                                       class="text-blue-600 hover:text-blue-800 font-medium">
                                        {{ optional($employerProfile)->website }}
                                    </a>
                                @else
                                    <p class="text-gray-800">-</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Company Description Section -->
                    <div class="mt-8">
                        <p class="text-sm text-gray-500 mb-2">Company Description</p>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-700">{{ optional($employerProfile)->company_description ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- Address Section -->
                    <div class="mt-6">
                        <p class="text-sm text-gray-500 mb-2">Address</p>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-700">{{ optional($employerProfile)->address ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="bg-gray-50 px-6 py-4 flex justify-end">
                    <a href="{{ route('employers.edit', $user->id) }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
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
