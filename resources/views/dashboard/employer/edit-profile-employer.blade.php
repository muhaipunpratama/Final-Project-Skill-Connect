@extends('dashboard.template')

@section('header')
    <div>

    </div>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 -mt-8">
    <div class="bg-white rounded-xl shadow-lg">
        <div class="p-8">
            <form action="{{ route('employer.update', $employer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <p class="font-semibold">There are some errors:</p>
                        </div>
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Company Information -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 pb-4">
                            <h2 class="text-xl font-semibold text-black mb-4">General Information</h2>
                            <div class="space-y-4">
                                <div>
                                    <label for="company_name" class="block text-sm font-medium text-black mb-1">Company Name</label>
                                    <input type="text" id="company_name" name="company_name" 
                                        value="{{ old('company_name', $employer->company_name ?? '') }}" required
                                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-colors text-black">
                                </div>

                                <div>
                                    <label for="industry" class="block text-sm font-medium text-black mb-1">Industry</label>
                                    <input type="text" id="industry" name="industry" 
                                        value="{{ old('industry', $employer->industry ?? '') }}"
                                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-colors text-black">
                                </div>

                                <div>
                                    <label for="website" class="block text-sm font-medium text-black mb-1">Website</label>
                                    <input type="url" id="website" name="website" 
                                        value="{{ old('website', $employer->website ?? '') }}"
                                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-colors text-black">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 pb-4">
                            <h2 class="text-xl font-semibold text-black mb-4">Contact & Location</h2>
                            <div class="space-y-4">
                                <div>
                                    <label for="contact" class="block text-sm font-medium text-black mb-1">Phone Number</label>
                                    <input type="tel" id="contact" name="contact" 
                                        value="{{ old('contact', $employer->contact ?? '') }}"
                                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-colors text-black">
                                </div>

                                <div>
                                    <label for="address" class="block text-sm font-medium text-black mb-1">Address</label>
                                    <textarea id="address" name="address" rows="3"
                                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-colors text-black">{{ old('address', $employer->address ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Full Width Sections -->
                    <div class="md:col-span-2 space-y-6">
                        <div class="border-b border-gray-200 pb-4">
                            <h2 class="text-xl font-semibold text-black mb-4">Company Description</h2>
                            <textarea id="company_description" name="company_description" rows="6"
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-colors text-black">{{ old('company_description', $employer->company_description ?? '') }}</textarea>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold text-black mb-4">Company Logo</h2>
                            <div class="flex items-center space-x-6">
                                <div class="flex-shrink-0">
                                    @if ($employer->profile_picture)
                                        <img src="{{ asset('storage/' . $employer->profile_picture) }}" alt="Company Logo" 
                                            class="h-40 w-40 object-cover rounded-lg border-2 border-gray-200">
                                    @else
                                        <div class="h-40 w-40 rounded-lg bg-gray-100 flex items-center justify-center">
                                            <span class="text-gray-400">No logo</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <input type="file" id="profile_picture" name="profile_picture"
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition-colors">
                                    <p class="mt-2 text-sm text-gray-500">PNG, JPG up to 5MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" 
                        class="inline-flex items-center px-8 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
