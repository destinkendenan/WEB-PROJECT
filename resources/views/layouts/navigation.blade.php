
<nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-800 fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="#jumbotron">
                    <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    {{-- <h2 class="text-4xl font-extrabold bg-gradient-to-r from-teal-400 via-cyan-500 to-blue-500 text-transparent bg-clip-text">
                        Cari<span class="text-teal-300">Kerja</span><span class="text-blue-400">ID</span>
                    </h2> --}}
                </a>
            </div>
            
            <!-- Centered Navigation Links -->
            <div class="hidden sm:flex sm:space-x-8">
                <a href="{{ route('welcome') }}#home" class="text-white hover:text-gray-300 px-3 py-2 text-sm font-medium">Home</a>
                <a href="#jobs" class="text-white hover:text-gray-300 px-3 py-2 text-sm font-medium">Find Jobs</a>
                <a href="#contact" class="text-white hover:text-gray-300 px-3 py-2 text-sm font-medium">Contact</a>
            </div>
            
            <!-- Settings Dropdown -->
            {{-- <div class="flex items-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                            <div class="relative ml-3">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 bg-gray-700 hover:bg-gray-600">
                                            <div>{{ Auth::user()->name }}</div>
                                            <svg class="ml-1 h-4 w-4 fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </x-slot>
    
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
    
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-gray-200 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-300">Register</a>
                        @endif
                    @endauth
                @endif
            </div> --}}
            <div class="hidden sm:flex sm:items-center space-x-4">
                @if (Auth::check())
                    @if (Request::is('welcome'))
                    <a href="{{ route('dashboard') }}">
                        <button class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 bg-gray-700 hover:bg-gray-600">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ml-1 h-4 w-4 fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </a>
                    @elseif (Request::is('dashboard'))
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-300 bg-gray-700 hover:bg-gray-600">
                                    <div>{{ Auth::user()->name }}</div>
                                    <svg class="ml-1 h-4 w-4 fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @endif
                @else
                <div class="flex space-x-2">
                    <a href="{{ route('login') }}" class="px-3 py-2 text-gray-300 hover:text-white transition">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-slate-800 bg-gray-200 hover:bg-gray-300 transition">Register</a>
                    @endif
                </div>
                
                @endif
            </div>
            
            <!-- Hamburger Menu -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="#jumbotron" class="block text-gray-300 px-4 py-2 text-sm font-medium">Home</a>
            <a href="#jobs" class="block text-gray-300 px-4 py-2 text-sm font-medium">Find Jobs</a>
            <a href="#contact" class="block text-gray-300 px-4 py-2 text-sm font-medium">Contact</a>
        </div>
        <div class="border-t border-gray-700 pt-4 pb-2">
            @auth
                <div class="space-y-1">
                    <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                    </form>
                </div>
            @else
                <div class="space-y-2">
                    <a href="{{ route('login') }}" class="block w-full px-4 py-2 text-center text-white bg-blue-600 rounded-md">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block w-full px-4 py-2 text-center text-white bg-green-600 rounded-md">Register</a>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>


