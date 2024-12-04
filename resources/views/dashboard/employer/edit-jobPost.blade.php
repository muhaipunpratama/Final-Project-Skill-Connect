@extends('dashboard.template')

@section('header')
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-800 to-gray-900 py-6 px-4">
    <form action="{{ route('jobPost.update', $selectedEmployer->id) }}" method="POST" class="max-w-4xl mx-auto">
        @csrf
        @method('PUT')
        <div class="bg-gray-800 rounded-xl shadow-lg p-8 border border-gray-700">
            <div class="grid gap-6 md:grid-cols-2">
                <div class="col-span-2">
                    <label for="title" class="flex items-center text-white text-sm font-semibold mb-2">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                        Job Title
                    </label>
                    <input type="text" name="title" id="title" value="{{ $selectedEmployer->title }}" class="w-full px-4 py-3 rounded-lg bg-gray-700 border-2 border-gray-600 text-white placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-200 transition-all duration-200">
                </div>
                <div class="col-span-2">
                    <label for="location" class="flex items-center text-white text-sm font-semibold mb-2">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                        Location
                    </label>
                    <input type="text" name="location" id="location" value="{{ $selectedEmployer->location }}" class="w-full px-4 py-3 rounded-lg bg-gray-700 border-2 border-gray-600 text-white placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-200 transition-all duration-200">
                </div>
                <div class="col-span-2">
                    <label for="job_type" class="flex items-center text-white text-sm font-semibold mb-2">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                        Job Type
                    </label>
                    <select name="job_type" id="job_type" class="w-full px-4 py-3 rounded-lg bg-gray-700 border-2 border-gray-600 text-white placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-200 transition-all duration-200">
                        <option value="full-time" {{ $selectedEmployer->job_type == 'full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="part-time" {{ $selectedEmployer->job_type == 'part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="freelance" {{ $selectedEmployer->job_type == 'freelance' ? 'selected' : '' }}>Freelance</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="description" class="flex items-center text-white text-sm font-semibold mb-2">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/></svg>
                        Description
                    </label>
                    <textarea name="description" id="description" rows="4" class="w-full px-4 py-3 rounded-lg bg-gray-700 border-2 border-gray-600 text-white placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-200 transition-all duration-200">{{ $selectedEmployer->description }}</textarea>
                </div>
                <div class="col-span-2">
                    <label for="requirements" class="flex items-center text-white text-sm font-semibold mb-2">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/></svg>
                        Requirements
                    </label>
                    <textarea name="requirements" id="requirements" rows="4" class="w-full px-4 py-3 rounded-lg bg-gray-700 border-2 border-gray-600 text-white placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-200 transition-all duration-200">{{ $selectedEmployer->requirements }}</textarea>
                </div>
                <div class="col-span-2">
                    <label for="salary" class="flex items-center text-white text-sm font-semibold mb-2">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/></svg>
                        Salary
                    </label>
                    <input type="number" name="salary" id="salary" value="{{ $selectedEmployer->salary }}" class="w-full px-4 py-3 rounded-lg bg-gray-700 border-2 border-gray-600 text-white placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-200 transition-all duration-200">
                </div>
                <div class="col-span-2">
                    <label for="status" class="flex items-center text-white text-sm font-semibold mb-2">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/></svg>
                        Status
                    </label>
                    <select name="status" id="status" class="w-full px-4 py-3 rounded-lg bg-gray-700 border-2 border-gray-600 text-white placeholder-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-200 transition-all duration-200">
                        <option value="active" {{ $selectedEmployer->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="closed" {{ $selectedEmployer->status == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div class="col-span-2 flex justify-end space-x-4 mt-8">
                    <a href="{{ url()->previous() }}" class="px-6 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-600 focus:ring-4 focus:ring-gray-500 transition-all duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back
                    </a>
                    <button type="submit" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-500 transition-all duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        Update Job
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
