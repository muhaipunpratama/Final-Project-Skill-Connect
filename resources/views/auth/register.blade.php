<x-guest-layout>
    <div>
        <div class="container mx-auto px-4 min-h-screen flex flex-col items-center justify-center relative">
            <!-- Reduced size of decorative elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
                <div class="absolute top-10 left-10 w-16 h-16 bg-blue-500 rounded-full mix-blend-multiply filter blur-lg opacity-20 animate-blob"></div>
                <div class="absolute top-0 right-10 w-16 h-16 bg-purple-500 rounded-full mix-blend-multiply filter blur-lg opacity-20 animate-blob animation-delay-2000"></div>
                <div class="absolute bottom-10 left-1/2 w-20 h-20 bg-indigo-500 rounded-full mix-blend-multiply filter blur-lg opacity-20 animate-blob animation-delay-4000"></div>
                <div class="absolute bottom-20 right-20 w-20 h-20 bg-pink-500 rounded-full mix-blend-multiply filter blur-lg opacity-20 animate-blob animation-delay-6000"></div>
            </div>
            
            <div class="w-full max-w-md bg-white/90 backdrop-blur-md rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
                <div class="p-6">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">
                            Register as <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">{{ str_replace('_', ' ', session('user_role', $role)) }}</span>
                        </h2>
                        <p class="text-gray-600 mt-2 text-sm">Create your account to get started</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf
                        <input type="hidden" name="role" value="{{ session('user_role', $role) }}">

                        <div class="space-y-1">
                            <x-input-label for="username" :value="__('Username')" class="text-gray-700"/>
                            <x-text-input id="username" class="block w-full px-3 py-2 rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition-colors duration-200" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" placeholder="Enter your username"/>
                            <x-input-error :messages="$errors->get('username')" class="mt-1" />
                        </div>

                        <div class="space-y-1">
                            <x-input-label for="email" :value="__('Email')" class="text-gray-700"/>
                            <x-text-input id="email" class="block w-full px-3 py-2 rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition-colors duration-200" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        <div class="space-y-1">
                            <x-input-label for="password" :value="__('Password')" class="text-gray-700"/>
                            <x-text-input id="password" class="block w-full px-3 py-2 rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition-colors duration-200" type="password" name="password" required autocomplete="new-password" placeholder="Enter your password"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>

                        <div class="space-y-1">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700"/>
                            <x-text-input id="password_confirmation" class="block w-full px-3 py-2 rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition-colors duration-200" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password"/>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                        </div>

                        <button type="submit" class="w-full py-2 px-3 text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg font-semibold text-sm">
                            {{ __('Register') }}
                        </button>

                        <p class="text-center text-gray-600 text-sm mt-4">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 font-medium ml-1 transition-colors duration-200">
                                Login here
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(20px, -30px) scale(1.1); }
            66% { transform: translate(-15px, 15px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
    </style>
</x-guest-layout>
