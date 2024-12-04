@extends('dashboard.template')

@section('header')
    <h1 class="text-2xl font-bold text-gray-800">Job Seeker Profile</h1>
@endsection

@section('content')
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.store') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label for="username" class="text-sm font-medium text-gray-700 block mb-2">Username</label>
                            <input id="username" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                                type="text" 
                                name="username" 
                                required 
                                autofocus />
                        </div>

                        <div>
                            <label for="email" class="text-sm font-medium text-gray-700 block mb-2">Email</label>
                            <input id="email" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                                type="email" 
                                name="email" 
                                required />
                        </div>

                        <div>
                            <label for="password" class="text-sm font-medium text-gray-700 block mb-2">Password</label>
                            <input id="password" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                                type="password" 
                                name="password" 
                                required />
                        </div>

                        <div>
                            <label for="role" class="text-sm font-medium text-gray-700 block mb-2">Role</label>
                            <select id="role" 
                                name="role" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white" 
                                required>
                                <option value="admin">Administrator</option>
                                <option value="employer">Employer</option>
                                <option value="job_seeker">Job Seeker</option>
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                class="px-6 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                                Create Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
