@extends('backend.system.layout.master')
@section('title')
    Campaign
@endsection
@section('content')
    <section class="bg-gray-100 min-h-screen p-4 md:p-8">

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-stretch md:items-center mb-6 gap-3">
            <input type="text" placeholder="Search campaigns..."
                class="border border-gray-300 rounded-lg px-4 py-2.5 w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
            <a href="{{ route('campaigns.create') }}"
                class="px-6 py-2.5 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors text-center font-medium whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i>Add Campaign
            </a>
        </div>

        <!-- Table Container -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Campaign
                            </th>
                            <th
                                class="px-4 lg:px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Goal Progress
                            </th>
                            <th
                                class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Received Funds
                            </th>
                            <th
                                class="px-4 lg:px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Start & End
                            </th>
                            <th
                                class="px-4 lg:px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-4 lg:px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider hidden md:table-cell">
                                Donors
                            </th>
                            <th
                                class="px-4 lg:px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($resources as $campaign)
                            <tr class="hover:bg-gray-50 transition-colors ">
                                <!-- Campaign Info -->
                                <td class="px-4 lg:px-6 py-4 ">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $campaign->image ? asset('uploads/campaigns/' . $campaign->image) : 'https://via.placeholder.com/50' }}"
                                            alt="{{ $campaign->title }}"
                                            class="w-12 h-12 rounded-lg object-cover flex-shrink-0">
                                        <div class="min-w-0 flex-1">
                                            <div
                                                class="text-sm font-semibold text-gray-900 truncate hover:text-blue-600 transition-colors w-48">
                                                {{ $campaign->title }}
                                            </div>
                                            <div class="text-xs text-gray-500 truncate mt-0.5">
                                                {{ $campaign->category->name ?? 'Uncategorized' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Goal Progress -->
                                <td class="px-4 lg:px-6 py-4">
                                    <div class="flex flex-col items-center justify-center">
                                        @php
                                            $percentage = $campaign->goal_amount
                                                ? min(
                                                    round(
                                                        (($campaign->raised_amount ?? 0) / $campaign->goal_amount) *
                                                            100,
                                                    ),
                                                    100,
                                                )
                                                : 0;
                                        @endphp
                                        <div class="relative w-16 h-16">
                                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                                                <circle class="text-gray-200" stroke-width="3.5" stroke="currentColor"
                                                    fill="transparent" r="15.915" cx="18" cy="18" />
                                                <circle class="text-blue-500" stroke-width="3.5"
                                                    stroke-dasharray="{{ $percentage }},100" stroke-linecap="round"
                                                    fill="transparent" r="15.915" cx="18" cy="18" />
                                            </svg>
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <span class="text-sm font-bold text-gray-700">{{ $percentage }}%</span>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1">
                                            ${{ number_format($campaign->goal_amount ?? 0) }} goal
                                        </div>
                                    </div>
                                </td>

                                <!-- Received Funds -->
                                <td class="px-4 lg:px-6 py-4">
                                    <div class="text-sm font-semibold text-purple-600">
                                        ${{ number_format($campaign->raised_amount ?? 0, 2) }}
                                    </div>
                                    <div class="text-xs text-gray-500 mt-0.5">
                                        raised
                                    </div>
                                </td>

                                <td class="px-4 lg:px-6 py-4 text-center hidden md:table-cell">
                                    <span
                                        class=" text-sm border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors font-medium">
                                        <p>{{ $campaign->start_date->toDateString() }}</p>
                                        <p>{{ $campaign->end_date->toDateString() }}</p>
                                    </span>
                                </td>

                                <!-- Status -->
                                <td class="px-4 lg:px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                        {{ $campaign->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($campaign->status) }}
                                    </span>
                                </td>



                                <!-- Donors -->
                                <td class="px-4 lg:px-6 py-4 text-center hidden md:table-cell">
                                    <button
                                        class="px-4 py-1.5 text-sm border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors font-medium">
                                        <i class="fas fa-users mr-1 text-gray-500"></i>
                                        View Donors
                                    </button>
                                </td>

                                <!-- Actions -->
                                <td class="px-4 lg:px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('campaigns.edit', $campaign->id) }}"
                                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                            title="Edit">
                                            <i class="fas fa-edit text-lg"></i>
                                        </a>
                                        <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this campaign?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                                title="Delete">
                                                <i class="fas fa-trash text-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-folder-open text-gray-300 text-5xl mb-4"></i>
                                        <p class="text-gray-500 text-lg font-medium">No campaigns found</p>
                                        <p class="text-gray-400 text-sm mt-1">Get started by creating your first campaign
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if (method_exists($resources, 'links'))
                <div class="px-4 py-3 border-t border-gray-200 bg-gray-50">
                    {{ $resources->links() }}
                </div>
            @endif
        </div>

    </section>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection
