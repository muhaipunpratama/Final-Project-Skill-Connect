@extends('dashboard.template')

@section('header')
    <div class="flex justify-center">
    </div>
@endsection

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-8">
                    <h2 class="text-lg font-medium text-gray-900">Profile</h2>
                    @if(isset($employer) && $employer->id)
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            <!-- Logo Section -->
                            <div class="lg:col-span-1">
                                <div class="flex flex-col items-center p-6 bg-gray-100 rounded-xl shadow-lg">
                                    <img src="{{ asset('storage/' . $employer->profile_picture) }}" 
                                         alt="Company Logo" 
                                         class="h-48 w-48 object-cover rounded-full shadow-md">
                                    <h2 class="mt-4 text-2xl font-semibold text-black">{{ $employer->company_name }}</h2>
                                    <p class="mt-1 text-sm text-black">{{ $employer->industry }}</p>
                                </div>
                            </div>

                            <!-- Company Details -->
                            <div class="lg:col-span-2 space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Left Column -->
                                    <div class="space-y-6">
                                        <div>
                                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Description</label>
                                            <p class="mt-2 text-black leading-relaxed">{{ $employer->company_description }}</p>
                                        </div>

                                        <div>
                                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Website</label>
                                            <a href="{{ $employer->website }}" 
                                               class="mt-2 flex items-center text-blue-500 hover:text-blue-700">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                          d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                </svg>
                                                {{ $employer->website }}
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="space-y-6">
                                        <div>
                                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Contact</label>
                                            <p class="mt-2 flex items-center text-black">
                                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                                </svg>
                                                {{ $employer->contact }}
                                            </p>
                                        </div>

                                        <div>
                                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Address</label>
                                            <p class="mt-2 flex items-start text-black">
                                                <svg class="w-4 h-4 mr-2 mt-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                {{ $employer->address }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Button -->
                                <div class="pt-6 border-t border-gray-300">
                                    <a href="{{ route('employer.edit', $employer->id) }}" 
                                       class="inline-flex items-center px-8 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <form action="{{ route('employer.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            @if ($errors->any())
                                <div class="p-4 mb-6 rounded-lg bg-red-100 border-l-4 border-red-500">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <ul class="list-disc list-inside text-sm text-red-600">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Form fields with enhanced styling -->
                                <div class="space-y-6">
                                    <div class="mb-6">
                                        <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                                        <input type="text" class="form-control mt-1 block w-full bg-gray-100 text-gray-900" id="company_name" name="company_name" value="{{ old('company_name') }}" required>
                                    </div>

                                    <div class="mb-6">
                                        <label for="company_description" class="block text-sm font-medium text-gray-700">Company Description</label>
                                        <textarea class="form-control mt-1 block w-full bg-gray-100 text-gray-900" id="company_description" name="company_description" rows="4">{{ old('company_description') }}</textarea>
                                    </div>

                                    <div class="mb-6">
                                        <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                                        <input type="text" class="form-control mt-1 block w-full bg-gray-100 text-gray-900" id="industry" name="industry" value="{{ old('industry') }}">
                                    </div>

                                    <div class="mb-6">
                                        <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                                        <input type="url" class="form-control mt-1 block w-full bg-gray-100 text-gray-900" id="website" name="website" value="{{ old('website') }}">
                                    </div>
                                </div>
                                
                                <div class="space-y-6">
                                    <div class="mb-6">
                                        <label for="contact" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                        <input type="tel" class="form-control mt-1 block w-full bg-gray-100 text-gray-900" id="contact" name="contact" value="{{ old('contact') }}">
                                    </div>

                                    <div class="mb-6">
                                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                        <textarea class="form-control mt-1 block w-full bg-gray-100 text-gray-900" id="address" name="address" rows="3">{{ old('address') }}</textarea>
                                    </div>

                                    <div class="mb-6">
                                        <label for="profile_picture" class="block text-sm font-medium text-gray-700">Company Logo</label>
                                        <input type="file" class="form-control mt-1 block w-full bg-gray-100 text-gray-900" id="profile_picture" name="profile_picture">
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6 border-t border-gray-300">
                                <button type="submit" 
                                        class="inline-flex items-center justify-center w-full md:w-auto px-6 py-3 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-500 text-white rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Save Profile
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection