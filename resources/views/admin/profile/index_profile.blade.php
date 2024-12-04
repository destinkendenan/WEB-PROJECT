{{-- <x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>
    
    <div class="p-6 bg-white shadow-md sm:rounded-lg">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">User List</h2>
        
        <div class="relative overflow-x-auto rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Username</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">No. HP</th>
                        <th scope="col" class="px-6 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($users as $user)
                        @if ($user->role === 'employer')
                            <tr class="bg-white hover:bg-blue-50 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $user->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->employerProfile->phone ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('employers.show', $user->id) }}" class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">View Profile</a>
                                </td>
                            </tr>
                        @elseif ($user->role === 'job_seeker')
                            <tr class="bg-white hover:bg-green-50 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $user->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->jobSeekerProfile->phone ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('job_seekers.show', $user->id) }}" class="inline-block px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600">View Profile</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>


{{-- <x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Username</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">No. HP</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if ($user->role === 'employer')
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->employerProfile->phone ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('employers.show', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View Profile</a>
                            </td>
                        </tr>
                    @elseif ($user->role === 'job_seeker')
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->jobSeekerProfile->phone ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('job_seekers.show', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View Profile</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout> --}} --}}