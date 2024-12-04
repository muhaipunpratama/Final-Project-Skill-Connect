<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900 min-h-screen font-['Poppins']">
    <div class="container mx-auto px-4 min-h-screen flex flex-col items-center justify-center relative">
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-10 left-10 w-40 h-40 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
            <div class="absolute top-0 right-10 w-40 h-40 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-10 left-1/2 w-40 h-40 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>

        <!-- Logo -->
        <div class="mb-12 transform hover:scale-110 transition-transform duration-300">
            <svg class="w-20 h-20 text-white opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        </div>

        <h2 class="text-3xl md:text-5xl font-bold text-white mb-16 text-center tracking-wider">
            Choose Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400 animate-pulse">Path</span>
        </h2>
        
        <div class="flex flex-col md:flex-row gap-6 w-full max-w-5xl justify-center items-stretch px-4">
            <!-- Job Seeker Card -->
            <form action="{{ route('role') }}" method="POST" class="w-full md:w-1/3 max-w-xs transform transition-all duration-500 hover:scale-105">
                @csrf
                <div class="h-full bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-200 hover:border-blue-400/50 transition-all duration-300">
                    <div class="p-4 bg-gradient-to-br from-blue-100 to-blue-200">
                        <svg class="w-16 h-16 mx-auto text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="px-6 py-6">
                        <h3 class="text-2xl font-bold text-center mb-4 text-gray-800">Job Seeker</h3>
                        <p class="text-gray-600 text-center mb-6 text-sm">Unlock your career potential</p>
                        <input type="hidden" name="role" value="job_seeker">
                        <button type="submit" class="block w-full py-2 px-4 text-center text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl font-semibold text-sm">
                            Start Your Journey
                        </button>
                    </div>
                </div>
            </form>

            <!-- Employer Card -->
            <form action="{{ route('role') }}" method="POST" class="w-full md:w-1/3 max-w-xs transform transition-all duration-500 hover:scale-105">
                @csrf
                <div class="h-full bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-200 hover:border-purple-400/50 transition-all duration-300">
                    <div class="p-4 bg-gradient-to-br from-purple-100 to-purple-200">
                        <svg class="w-16 h-16 mx-auto text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div class="px-6 py-6">
                        <h3 class="text-2xl font-bold text-center mb-4 text-gray-800">Employer</h3>
                        <p class="text-gray-600 text-center mb-6 text-sm">Build your dream team with top talent</p>
                        <input type="hidden" name="role" value="employer">
                        <button type="submit" class="block w-full py-2 px-4 text-center text-white bg-gradient-to-r from-purple-500 to-purple-700 hover:from-purple-600 hover:to-purple-800 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl font-semibold text-sm">
                            Start Hiring
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-16 text-center">
            <p class="text-gray-300 text-sm">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 underline font-medium ml-1 transition-colors duration-300">
                    Login here
                </a>
            </p>
        </div>
    </div>

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</body>
</html>
