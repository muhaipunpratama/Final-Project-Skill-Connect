@extends('dashboard.template')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">{{ $job->title }}</h2>
                    <p class="text-gray-600 mb-2">{{ $job->employer->company_name }}</p>
                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ $job->location }}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>{{ $job->job_type }}</span>
                    </div>
                    <p class="text-gray-700 mb-4">{{ $job->description }}</p>
                    <h3 class="text-lg font-semibold mb-2">Requirements:</h3>
                    <ul class="list-disc list-inside mb-4">
                        @foreach (explode("\n", $job->requirements) as $requirement)
                            <li>{{ $requirement }}</li>
                        @endforeach
                    </ul>
                    <p class="text-gray-700 mb-4"><strong>Salary:</strong> {{ $job->salary }}</p>
                    <p class="text-gray-700"><strong>Status:</strong> {{ $job->status }}</p>
                    <a href="{{ route('jobseeker.job.list') }}" 
                        class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
