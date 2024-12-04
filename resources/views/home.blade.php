<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .mobile-menu {
                display: none;
            }

            .mobile-menu.active {
                display: block;
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="gradient-bg text-white shadow-lg fixed w-full z-10">
        <div class="container mx-auto px-4 py-3">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-briefcase text-2xl"></i>
                    <h1 class="text-xl md:text-2xl font-bold">SkillConnect</h1>
                </div>
                @if (Route::has('login'))
                    <div class="hidden md:flex space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-4 py-2 bg-white text-indigo-600 rounded-lg hover:bg-indigo-50 transition duration-300">
                                <i class="fas fa-gauge-high mr-2"></i>Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-4 py-2 bg-white text-indigo-600 rounded-lg hover:bg-indigo-50 transition duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('roleOption') }}"
                                    class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition duration-300">
                                    <i class="fas fa-user-plus mr-2"></i>Register
                                </a>
                            @endif
                        @endauth
                    </div>
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden rounded-lg focus:outline-none focus:ring-2 focus:ring-white">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                @endif
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 pt-24">
        <!-- Hero Section -->
        <section class="text-center mb-12 px-4">
            <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mb-4">Find Your Dream Job</h1>
            <p class="text-gray-600 text-base md:text-lg">Discover thousands of job opportunities with all the
                information you need.</p>
        </section>

        <!-- Search Bar and Filters -->
        <section class="bg-white p-4 md:p-6 rounded-xl shadow-md mb-8">
            <form method="GET" action="{{ route('home') }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    <div class="md:col-span-2">
                        <div class="relative">
                            <input type="text" name="search"
                                class="w-full p-3 border border-gray-300 rounded-lg pl-10" placeholder="Search jobs..."
                                value="{{ request('search') }}">
                            <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                        </div>
                    </div>
                    <!-- Dropdown Locations -->
                    <select name="location" class="p-3 border border-gray-300 rounded-lg">
                        <option value="">📍 All Locations</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location }}"
                                {{ request('location') == $location ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('-', ' ', $location)) }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Dropdown Job Types -->
                    <select name="type" class="p-3 border border-gray-300 rounded-lg">
                        <option value="">💼 Job Type</option>
                        @foreach ($jobTypes as $type)
                            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                {{ ucfirst($type) }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Dropdown Salary Ranges -->
                    <select name="salary" class="p-3 border border-gray-300 rounded-lg">
                        <option value="">💰 Salary Range</option>
                        @foreach ($salaryRanges as $key => $label)
                            <option value="{{ $key }}" {{ request('salary') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>

                    <div class="md:col-span-2 lg:col-span-1">
                        <button type="submit"
                            class="w-full p-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300">
                            <i class="fas fa-filter mr-2"></i>Filter Jobs
                        </button>
                    </div>
                </div>
            </form>
        </section>

        <!-- Job Listings -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($jobs as $job)
                <article class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl card-hover transition duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h5 class="text-xl font-bold text-gray-800 mb-2">{{ $job->title }}</h5>
                            <p class="text-indigo-600 font-medium">{{ $job->company }}</p>
                        </div>
                        <span
                            class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">{{ ucfirst($job->type) }}</span>
                    </div>
                    <div class="space-y-2 mb-4">
                        <p class="text-gray-600 flex items-center">
                            <i class="fas fa-map-marker-alt w-5"></i> {{ ucfirst($job->location) }}
                        </p>
                        <p class="text-gray-600 flex items-center">
                            <i class="fas fa-dollar-sign w-5"></i> {{ $job->salary }}
                        </p>
                    </div>
                    <a href="/job-details/{{ $job->id }}"
                        class="block text-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300">
                        View Details
                    </a>
                </article>
            @endforeach
        </section>
        <!-- Pagination -->
        <section class="mt-8 flex justify-center">
            {{ $jobs->links() }}
        </section>
    </main>



<footer class="fixed bottom-0 left-0 z-20 w-full p-4 gradient-bg border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6">
    <span class="text-sm text-white sm:text-center">© 2024 SkillConnect <a href="https://flowbite.com/" class="hover:underline"</a>. All Rights Reserved.
    </span>
   
</footer>

</body>

</html>
