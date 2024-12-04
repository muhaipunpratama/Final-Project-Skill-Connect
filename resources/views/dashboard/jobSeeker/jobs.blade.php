@extends('dashboard.template')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Search Form -->
        <form method="GET" action="{{ route('jobseeker.job.list') }}" 
            class="mb-8 bg-white backdrop-blur-xl bg-opacity-95 rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-black tracking-wide">Search Jobs</label>
                    <div class="relative">
                        <input type="text" name="search" placeholder="Search jobs..." 
                            class="w-full pl-10 pr-4 py-3 rounded-xl border-0 ring-1 ring-gray-200 focus:ring-2 focus:ring-blue-500 bg-white shadow-sm text-black" 
                            value="{{ request('search') }}">
                        <svg class="absolute left-3 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-black">Location</label>
                    <select name="location" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 text-black">
                        <option value="">All Locations</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-black">Job Type</label>
                    <select name="job_type" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-black">
                        <option value="">All Job Types</option>
                        @foreach ($jobTypes as $jobType)
                            <option value="{{ $jobType }}" {{ request('job_type') == $jobType ? 'selected' : '' }}>{{ $jobType }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-black">Salary Range</label>
                    <select name="salary" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-black">
                        <option value="">All Salaries</option>
                        <option value="0-5000" {{ request('salary') == '0-5000' ? 'selected' : '' }}>0 - 5000</option>
                        <option value="5000-10000" {{ request('salary') == '5000-10000' ? 'selected' : '' }}>5000 - 10000</option>
                        <option value="10000-20000" {{ request('salary') == '10000-20000' ? 'selected' : '' }}>10000 - 20000</option>
                        <option value="20000+" {{ request('salary') == '20000+' ? 'selected' : '' }}>20000+</option>
                    </select>
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <button type="submit" 
                    class="group px-8 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform hover:scale-105 transition-all duration-200">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Filter Jobs
                    </span>
                </button>
            </div>
        </form>

        <!-- Job Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($jobs as $job)
                @if ($job->status !== 'closed')
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <div class="p-6 space-y-6">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-black group-hover:text-blue-600 transition-colors duration-200">
                                    {{ $job->title }}
                                </h3>
                                <p class="text-blue-600 font-semibold mt-1">{{ $job->employer->company_name }}</p>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $job->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($job->status) }}
                            </span>
                        </div>

                        <div class="flex flex-col gap-3">
                            <div class="flex items-center text-black">
                                <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                <span class="text-sm">{{ $job->location }}</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $job->job_type }}</span>
                            </div>
                        </div>

                        <div class="space-y-4 pt-4 border-t border-gray-100">
                            <a href="{{ route('jobseeker.job.details', $job->id) }}" 
                                class="flex items-center justify-center w-full py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 transform hover:scale-105 transition-all duration-200">
                                <span class="mr-2">View Details</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            
                            <form action="{{ route('jobseeker.apply', $job->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                @csrf
                                <div class="flex flex-col gap-2">
                                    <label for="cv" class="text-sm font-semibold text-gray-700">Upload CV</label>
                                    <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx" 
                                        class="w-full px-4 py-2 text-sm border border-gray-200 rounded-xl cursor-pointer
                                        file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 
                                        file:text-sm file:bg-blue-50 file:text-blue-700 
                                        hover:file:bg-blue-100 transition-all duration-200">
                                </div>
                                <button type="submit" 
                                    class="w-full py-3 bg-green-600 text-white font-medium rounded-xl hover:bg-green-700 transform hover:scale-105 transition-all duration-200 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Apply Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $jobs->links() }}
        </div>
    </div>
</div>
@endsection