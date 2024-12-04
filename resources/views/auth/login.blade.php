<x-guest-layout>
    <div>
        
        <div class="container mx-auto px-4 min-h-screen flex flex-col items-center justify-center relative">
            <!-- Enhanced Decorative Elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
                <div class="absolute top-10 left-10 w-32 h-32 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
                <div class="absolute top-0 right-10 w-32 h-32 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
                <div class="absolute bottom-10 left-1/2 w-32 h-32 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
                <div class="absolute bottom-20 right-20 w-32 h-32 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-6000"></div>
            </div>
            
            <div class="w-full max-w-md bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl overflow-hidden transform hover:scale-[1.01] transition-all duration-300">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800">
                            Welcome <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Back</span>
                        </h2>
                        <p class="text-gray-600 mt-2">Sign in to continue your journey</p>
                    </div>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <div class="space-y-2">
                            <x-input-label for="email" :value="__('Email')" class="text-gray-700"/>
                            <x-text-input id="email" 
                                class="block w-full px-4 py-3 rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition-colors duration-200" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autofocus 
                                autocomplete="username" 
                                placeholder="Enter your email"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="password" :value="__('Password')" class="text-gray-700"/>
                            <x-text-input id="password" 
                                class="block w-full px-4 py-3 rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition-colors duration-200" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="current-password"
                                placeholder="Enter your password"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>

                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a class="text-sm text-purple-600 hover:text-purple-800 transition-colors duration-200" href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="w-full py-3 px-4 text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg font-semibold text-center">
                            {{ __('Sign In') }}
                        </button>

                        <p class="text-center text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-800 font-medium ml-1 transition-colors duration-200">
                                Create Account
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
            33% { transform: translate(30px, -50px) scale(1.2); }
            66% { transform: translate(-20px, 20px) scale(0.8); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
    </style>
</x-guest-layout>
