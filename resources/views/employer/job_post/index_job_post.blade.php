<x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>
    
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Job Posts</h1>
            <a href="{{ route('job_posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                + Add Job Post
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="min-w-full bg-white w-full">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Job Title</th>
                        <th class="py-2 px-4 border-b">Company</th>
                        <th class="py-2 px-4 border-b">Location</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobPosts as $jobPost)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $jobPost->title }}</td>
                            <td class="py-2 px-4 border-b">{{ $jobPost->company_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $jobPost->location }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('job_posts.show', $jobPost->id) }}" class="text-blue-500 hover:underline">View</a>
                                <form action="{{ route('job_posts.destroy', $jobPost->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
