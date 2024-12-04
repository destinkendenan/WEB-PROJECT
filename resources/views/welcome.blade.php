<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header>
        @include('layouts.navigation')
    </header>

    <!-- Jumbotron -->
    @include('components.jumbotron')

    <div class="column">
        <!-- Job Cards -->
            @include('components.job_cards')
    </div>
    <!-- Pagination Links -->
    <div class="mt-6 flex justify-center">
        {{ $jobPosts->links() }}
    </div>
    

    <!-- Contact -->
    @include('components.contact')
    
    <!-- Footer -->
    @include('components.footer')
</body>
</html>
