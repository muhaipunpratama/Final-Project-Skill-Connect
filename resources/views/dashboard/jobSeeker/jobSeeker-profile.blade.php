@extends('dashboard.template')

@section('content')
<div class="min-h-screen bg-gray-50 py-8 px-4 md:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Header Card -->
        <div class="bg-white rounded-t-xl shadow-sm border-b border-gray-200 mb-6 p-6">
            <h2 class="text-3xl font-extrabold text-gray-900">Profile Settings</h2>
            <p class="mt-2 text-sm text-gray-600">Update your profile information and resume details</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-xl shadow-sm">
            <form method="POST" action="{{ route('jobSeeker.store') }}" enctype="multipart/form-data" class="divide-y divide-gray-200">
                @csrf
                
                <!-- Profile Section -->
                <div class="p-6 space-y-6">
                    <h3 class="text-xl font-semibold text-gray-900">Basic Information</h3>
                    
                    <div class="flex items-center space-x-6">
                        <div class="relative">
                            @if(isset($jobSeeker) && $jobSeeker->profile_picture)
                                <img src="{{ asset('storage/' . $jobSeeker->profile_picture) }}" 
                                     class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                            @else
                                <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center">
                                    <svg class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                            @endif
                            <label class="absolute bottom-0 right-0 bg-blue-600 rounded-full p-2 cursor-pointer hover:bg-blue-700 transition">
                                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <input type="file" name="profile_picture" class="hidden">
                            </label>
                        </div>
                        
                        <div class="space-y-1">
                            <h4 class="text-lg font-medium text-gray-900">Profile Picture</h4>
                            <p class="text-sm text-gray-500">PNG, JPG or GIF (MAX. 800x800px)</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Full Name</label>
                            <input type="text" name="full_name" value="{{ $jobSeeker->full_name ?? old('full_name') }}" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Date of Birth</label>
                            <input type="date" name="date_of_birth" value="{{ $jobSeeker->date_of_birth ?? old('date_of_birth') }}" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Gender</label>
                            <select name="gender" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="male" {{ (isset($jobSeeker) && $jobSeeker->gender == 'male') ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ (isset($jobSeeker) && $jobSeeker->gender == 'female') ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Phone</label>
                            <input type="text" name="contact" value="{{ $jobSeeker->contact ?? old('contact') }}" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- About Section -->
                <div class="p-6 space-y-6">
                    <h3 class="text-xl font-semibold text-gray-900">About You</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                            <textarea name="bio" rows="4" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none transition"
                                placeholder="Tell us about yourself...">{{ $jobSeeker->bio ?? old('bio') }}</textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Skills</label>
                            <textarea name="skills" rows="4" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ $jobSeeker->skills ?? old('skills') }}</textarea>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Education</label>
                            <textarea name="education_history" rows="4" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ $jobSeeker->education_history ?? old('education_history') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Documents Section -->
                <div class="p-6 space-y-6">
                    <h3 class="text-xl font-semibold text-gray-900">Documents</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                <div class="flex flex-col items-center justify-center pt-7">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                    </svg>
                                    <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                        Upload certificates
                                    </p>
                                </div>
                                <input type="file" name="certificates" class="hidden"/>
                            </label>
                        </div>
                        @if(isset($jobSeeker) && $jobSeeker->certificates)
                            <div class="flex items-center space-x-2 text-sm">
                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <a href="{{ asset('storage/' . $jobSeeker->certificates) }}" target="_blank" 
                                   class="text-blue-600 hover:text-blue-800 font-medium">View Current Certificate</a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="px-6 py-4 bg-gray-50 rounded-b-xl flex justify-end space-x-4">
                    <a href="{{ route('jobSeeker.index') }}" 
                       class="px-6 py-2.5 border border-gray-300 text-gray-700 font-medium text-sm rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-100 transition">
                        Cancel
                    </a>
                    <button type="submit" 
                        class="px-6 py-2.5 bg-purple-700 text-white font-medium text-sm rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection