<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64">
        <div class="flex flex-col h-0 flex-1 bg-gray-800">
            <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-4">
                    <span class="text-white text-xl font-bold">Coworking</span>
                </div>
                <nav class="mt-5 flex-1 px-2 space-y-1">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Icon Home -->
                        <svg class="mr-3 flex-shrink-0 h-6 w-6 {{ request()->routeIs('dashboard') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('spaces.index') }}" class="{{ request()->routeIs('spaces.*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Icon Spaces -->
                        <svg class="mr-3 flex-shrink-0 h-6 w-6 {{ request()->routeIs('spaces.*') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Espacios
                    </a>

                    <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Icon Users -->
                        <svg class="mr-3 flex-shrink-0 h-6 w-6 {{ request()->routeIs('users.*') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Usuarios
                    </a>

                    <a href="{{ route('reservations.index') }}" class="{{ request()->routeIs('reservations.*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Icon Calendar -->
                        <svg class="mr-3 flex-shrink-0 h-6 w-6 {{ request()->routeIs('reservations.*') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Mis Reservas
                    </a>
                </nav>
            </div>
            <div class="flex-shrink-0 flex bg-gray-700 p-4">
                <div class="flex-shrink-0 w-full group block">
                    <div class="flex items-center">
                        <div>
                            <div class="inline-block h-9 w-9 rounded-full bg-gray-500 flex items-center justify-center text-white font-bold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-white">
                                {{ Auth::user()->name }}
                            </p>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-xs font-medium text-gray-300 group-hover:text-gray-200">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
