@extends('dashboard.template')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('jobPost.store') }}" method="POST">
            @csrf
            <input type="hidden" name="employer_id" value="{{ Auth::user()->id }}">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-black mb-1">Job Title</label>
                <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-black" id="title" name="title" required>
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-black mb-1">Location</label>
                <input type="text" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-black" id="location" name="location" required>
            </div>

            <div class="mb-4">
                <label for="job_type" class="block text-sm font-medium text-black mb-1">Job Type</label>
                <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-black" id="job_type" name="job_type" required>
                    <option value="full-time">Full Time</option>
                    <option value="part-time">Part Time</option>
                    <option value="freelance">Freelance</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-black mb-1">Description</label>
                <textarea class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-black" id="description" name="description" required></textarea>
            </div>

            <div class="mb-4">
                <label for="requirements" class="block text-sm font-medium text-black mb-1">Requirements</label>
                <textarea class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-black" id="requirements" name="requirements" required></textarea>
            </div>

            <div class="mb-4">
                <label for="salary" class="block text-sm font-medium text-black mb-1">Salary</label>
                <input type="number" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-black" id="salary" name="salary" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
