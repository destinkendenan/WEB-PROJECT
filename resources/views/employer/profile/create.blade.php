<x-app-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>
    
    <div class="container">
        <h1>Create Employer Profile</h1>
        <form method="POST" action="{{ route('employers.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
            </div>
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" required>
            </div>
            <div class="form-group">
                <label for="company_description">Company Description</label>
                <input type="text" class="form-control" id="company_description" name="company_description">
            </div>
            <div class="form-group">
                <label for="industry">Industry</label>
                <input type="text" class="form-control" id="industry" name="industry">
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" class="form-control" id="website" name="website">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="text" class="form-control" id="logo" name="logo">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</x-app-layout>
