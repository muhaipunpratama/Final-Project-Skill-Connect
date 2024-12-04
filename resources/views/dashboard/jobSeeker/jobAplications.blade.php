@extends('dashboard.template')

@section('header')

@endsection

@section('content')
    <div class="py-8 px-4 md:py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 md:p-8">
                    <h2 class="text-2xl font-bold mb-8 text-gray-800 border-b pb-4">Application Status</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Job Title
                                    </th>
                                    <th class="px-4 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Location
                                    </th>
                                    <th class="px-4 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Job Type
                                    </th>
                                    <th class="px-4 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($applications as $application)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <a href="{{ route('jobseeker.job.details', $application->job_post_id) }}" 
                                               class="text-indigo-600 hover:text-indigo-800 font-medium transition-colors duration-200">
                                                {{ $application->jobPost->title }}
                                            </a>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-gray-700">
                                            {{ $application->jobPost->location }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-gray-700">
                                            {{ $application->jobPost->job_type }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            @if ($application->status === 'accepted')
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Accepted
                                                </span>
                                            @elseif ($application->status === 'rejected')
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Rejected
                                                </span>
                                            @else
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    In Process
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
