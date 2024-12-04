<nav class="fixed top-0 z-50 w-full bg-gradient-to-r from-blue-900 via-purple-900 to-indigo-900 border-b border-purple-700/30 backdrop-blur-sm dark:border-purple-800 shadow-xl">
    <div class="px-4 py-4 lg:px-6">
        {{-- Navbar Brand --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-100 rounded-lg sm:hidden hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-purple-400 transition-all duration-300">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ url('/') }}" class="flex ms-2 md:me-24 group relative">
                    <span class="self-center text-2xl font-black sm:text-3xl whitespace-nowrap text-transparent bg-clip-text bg-gradient-to-r from-white to-purple-200 group-hover:from-purple-200 group-hover:to-white transition-all duration-500">
                        Skill<span class="text-purple-300 group-hover:text-white">Connect</span>
                    </span>
                    <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-400 to-white group-hover:w-full transition-all duration-500"></div>
                </a>
            </div>
            {{-- User Dropdown --}}
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="group inline-flex items-center px-4 py-2.5 border-2 border-purple-400/20 text-lg font-medium rounded-xl text-gray-800 bg-white/95 hover:bg-white hover:border-purple-400/40 focus:outline-none focus:ring-2 focus:ring-purple-400/30 transition-all duration-300 shadow-lg shadow-purple-900/20">
                        <div class="flex items-center space-x-3">
                            <ion-icon name="person-circle-outline" class="w-6 h-6 text-purple-600 group-hover:scale-110 transition-transform duration-300"></ion-icon>
                            <span class="text-gray-700 group-hover:text-purple-700">
                                {{ Auth::user()->username }}
                            </span>
                        </div>

                        <div class="ms-2">
                            <svg class="fill-current h-4 w-4 text-purple-600 transition-all duration-300 group-hover:rotate-180 group-hover:text-purple-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="bg-white/95 backdrop-blur-sm rounded-xl overflow-hidden shadow-2xl border border-purple-100">
                        <x-dropdown-link :href="route('profile.edit')" 
                            class="flex items-center text-gray-700 hover:bg-purple-50 transition-all duration-300 px-4 py-3.5 space-x-3 group">
                            <ion-icon name="person-outline" class="w-5 h-5 text-purple-500 group-hover:text-purple-600 group-hover:scale-110 transition-all duration-300"></ion-icon>
                            <span class="font-medium group-hover:text-purple-600">{{ __('Profile') }}</span>
                        </x-dropdown-link>

                        {{-- Authentication --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center text-gray-700 hover:bg-red-50 transition-all duration-300 px-4 py-3.5 space-x-3 border-t border-gray-100 group">
                                <ion-icon name="log-out-outline" class="w-5 h-5 text-red-500 group-hover:text-red-600 group-hover:scale-110 transition-all duration-300"></ion-icon>
                                <span class="font-medium group-hover:text-red-600">{{ __('Logout') }}</span>
                            </x-dropdown-link>
                        </form>
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-purple-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700 shadow-lg"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white" style="margin-top: 30px;">
        <ul class="space-y-2">
            @if (Auth::check() && Auth::user()->role === 'admin')
                <li>
                    <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')" 
                        class="flex items-center p-3 text-lg rounded-lg hover:bg-gradient-to-r hover:from-purple-100 hover:to-blue-100 group transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black group-hover:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="ms-4 font-semibold text-black">{{ __('Manage Users') }}</span>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')"
                        class="flex items-center p-3 text-lg rounded-lg hover:bg-gradient-to-r hover:from-purple-100 hover:to-blue-100 group transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black group-hover:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="ms-4 font-semibold text-black">{{ __('Manage Employers') }}</span>
                    </x-nav-link>
                </li>
            @endif

            <li>
                <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')"
                    class="flex items-center p-3 text-lg rounded-lg hover:bg-gradient-to-r hover:from-purple-100 hover:to-blue-100 group transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black group-hover:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="ms-4 font-semibold text-black">{{ __('Profile') }}</span>
                </x-nav-link>
            </li>

            @if (Auth::check() && Auth::user()->role === 'employer')
                <li>
                    <x-nav-link :href="route('jobPost')" :active="request()->routeIs('jobPost')"
                        class="flex items-center p-3 text-lg rounded-lg hover:bg-gradient-to-r hover:from-purple-100 hover:to-blue-100 group transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black group-hover:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="ms-4 font-semibold text-black">{{ __('Job Listings') }}</span>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('employer.index')" :active="request()->routeIs('employer.create')"
                        class="flex items-center p-3 text-lg rounded-lg hover:bg-gradient-to-r hover:from-purple-100 hover:to-blue-100 group transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black group-hover:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span class="ms-4 font-semibold text-black">{{ __('Employer Profile') }}</span>
                    </x-nav-link>
                </li>
            @endif

            @if (Auth::check() && Auth::user()->role === 'job_seeker')
                <li>
                    <x-nav-link :href="route('jobSeeker.create')" :active="request()->routeIs('jobSeeker.create')"
                        class="flex items-center p-3 text-lg rounded-lg hover:bg-gradient-to-r hover:from-purple-100 hover:to-blue-100 group transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black group-hover:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ms-4 font-semibold text-black">{{ __('Job Seeker Profile') }}</span>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('jobseeker.job.list')" :active="request()->routeIs('jobseeker.job.list')"
                        class="flex items-center p-3 text-lg rounded-lg hover:bg-gradient-to-r hover:from-purple-100 hover:to-blue-100 group transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black group-hover:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span class="ms-4 font-semibold text-black">{{ __('View Jobs') }}</span>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('jobSeeker.applications')" :active="request()->routeIs('jobSeeker.applications')"
                        class="flex items-center p-3 text-lg rounded-lg hover:bg-gradient-to-r hover:from-purple-100 hover:to-blue-100 group transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black group-hover:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span class="ms-4 font-semibold text-black">{{ __('Application Status') }}</span>
                    </x-nav-link>
                </li>
            @endif
        </ul>
    </div>
</aside>
