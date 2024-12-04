<section id="jumbotron" class="bg-cover bg-center h-96 flex flex-col justify-center items-center text-center text-white mt-16" style="background-image: url('{{ asset('images/jumbotron3.jpg') }}');">
    <h1 class="text-4xl sm:text-6xl font-bold mb-4">Find Your Dream Job</h1>
    <p class="text-lg sm:text-2xl mb-6">Join thousands of professionals finding opportunities every day.</p>
    <form action="{{ route('job_posts.search') }}" method="GET" class="max-w-lg mx-auto my-4">
        <div class="relative flex shadow-lg">
            <!-- Input Field -->
            <input 
                type="text" 
                name="query" 
                class="w-full px-4 py-3 rounded-l-md text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                placeholder="Search for jobs..."
            />
    
            <!-- Search Button -->
            <button 
                type="submit" 
                class="px-3 bg-blue-600 text-white rounded-r-md hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>
            </button>
        </div>
    </form>
    
</section>