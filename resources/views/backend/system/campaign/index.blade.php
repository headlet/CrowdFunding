@extends('backend.system.layout.master')
@section('title')
    Fund | Campaign
@endsection

@include('backend.component.campaign-type')

@section('content')
    <section class="min-h-screen p-2 bg-gray-100 md:p-2">

        <!-- Header -->
        <div class="flex flex-col gap-4 mb-6 
            md:flex-row md:items-center md:justify-between">

            <!-- Search -->
            <div class="w-full md:w-80">
                <form action="{{ route('admin.campaigns.index') }}" method="GET"
                    class="flex items-center bg-white border border-gray-200 rounded-lg  focus-within:border-emerald-600  focus-within:ring-1 focus-within:ring-emerald-600  transition-all duration-200 shadow-sm">
                    <!-- Icon -->
                    <span class="pl-3 text-gray-400 text-sm">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>

                    <!-- Input -->
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search campaigns..."
                        class="flex-1 px-2 py-2 text-sm text-gray-700 placeholder-gray-400 bg-transparent focus:outline-none">

                    <!-- Button -->
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-800 transition-all duration-200  rounded-r-lg">
                        Go
                    </button>
                </form>
            </div>

            <!-- Add Button -->
            <div class="w-full md:w-auto">
                <a href="{{ route('admin.campaigns.create') }}"
                    class="block w-full md:w-auto text-center px-6 py-2.5 bg-gradient-to-b from-emerald-500 to-emerald-700 hover:from-emerald-800 hover:to-emerald-600 text-white rounded-lg transition-all duration-300 font-medium shadow-md">
                    Add Campaign
                </a>
            </div>

        </div>

        <!-- Table Container -->
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase lg:px-6">
                                <a href="{{ route('admin.campaigns.index', [
                                    'sort' => 'title',
                                    'direction' => request('direction') === 'asc' ? 'desc' : 'asc',
                                ]) }}"
                                    class="flex items-center gap-1">

                                    Campaign <i class="fa-solid fa-arrows-up-down"></i>

                                    @if (request('sort') === 'title')
                                        @if (request('direction') === 'asc')
                                            <i class="fas fa-arrow-up text-xs"></i>
                                        @else
                                            <i class="fas fa-arrow-down text-xs"></i>
                                        @endif
                                    @endif

                                </a>
                            </th>
                            <th
                                class="px-4 py-4 text-xs font-semibold tracking-wider text-center text-gray-700 uppercase lg:px-6">
                                Goal Progress
                            </th>
                            <th
                                class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase lg:px-6">
                                Received Funds
                            </th>
                            <th
                                class="px-4 py-4 text-xs font-semibold tracking-wider text-center text-gray-700 uppercase lg:px-6">
                                Start & End
                            </th>
                            <th
                                class="px-4 py-4 text-xs font-semibold tracking-wider text-center text-gray-700 uppercase lg:px-6">
                                Status
                            </th>
                            <th
                                class="hidden px-4 py-4 text-xs font-semibold tracking-wider text-center text-gray-700 uppercase lg:px-6 md:table-cell">
                                Donors
                            </th>
                            <th
                                class="px-4 py-4 text-xs font-semibold tracking-wider text-center text-gray-700 uppercase lg:px-6">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($resources as $campaign)
                            <tr class="transition-colors hover:bg-gray-50 ">
                                <!-- Campaign Info -->
                                <td class="px-4 py-4 lg:px-6 ">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $campaign->image ? asset('storage/' . $campaign->image) : 'https://via.placeholder.com/50' }}"
                                            alt="{{ $campaign->title }}"
                                            class="flex-shrink-0 object-cover w-12 h-12 rounded-lg">
                                        <div class="flex-1 min-w-0">
                                            <div
                                                class="w-48 text-sm font-semibold text-gray-900 truncate transition-colors hover:text-blue-600">
                                                {{ $campaign->title }}
                                            </div>
                                            <div class="text-xs text-gray-500 truncate mt-0.5">
                                                {{ $campaign->category->name ?? 'Uncategorized' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Goal Progress -->
                                <td class="px-4 py-4 lg:px-6">
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
                                        <div class="mt-1 text-xs text-gray-500">
                                            ${{ number_format($campaign->goal_amount ?? 0) }} goal
                                        </div>
                                    </div>
                                </td>

                                <!-- Received Funds -->
                                <td class="px-4 py-4 lg:px-6">
                                    <div class="text-sm font-semibold text-purple-600">
                                        ${{ number_format($campaign->raised_amount ?? 0, 2) }}
                                    </div>
                                    <div class="text-xs text-gray-500 mt-0.5">
                                        raised
                                    </div>
                                </td>

                                <td class="hidden px-4 py-4 text-center lg:px-6 md:table-cell">
                                    <span
                                        class="text-sm font-medium transition-colors border border-gray-300 rounded-lg hover:bg-gray-50">
                                        <p>{{ $campaign->start_date->toDateString() }}</p>
                                        <p>{{ $campaign->end_date->toDateString() }}</p>
                                    </span>
                                </td>

                                <!-- Status -->
                                <td class="px-4 py-4 text-center lg:px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                        {{ $campaign->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($campaign->status) }}
                                    </span>
                                </td>



                                <!-- Donors -->
                                <td class="hidden px-4 py-4 text-center lg:px-6 md:table-cell">
                                    <button
                                        class="px-4 py-1.5 text-sm border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors font-medium">
                                        <i class="mr-1 text-gray-500 fas fa-users"></i>
                                        View Donors
                                    </button>
                                </td>

                                <!-- Actions -->
                                <td class="px-4 py-4 lg:px-6">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.campaigns.edit', $campaign->id) }}"
                                            class="p-2 text-blue-600 transition-colors rounded-lg hover:bg-blue-50"
                                            title="Edit">
                                            <i class="text-lg fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.campaigns.destroy', $campaign->id) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this campaign?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-600 transition-colors rounded-lg hover:bg-red-50"
                                                title="Delete">
                                                <i class="text-lg fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="mb-4 text-5xl text-gray-300 fas fa-folder-open"></i>
                                        <p class="text-lg font-medium text-gray-500">No campaigns found</p>
                                        <p class="mt-1 text-sm text-gray-400">Get started by creating your first campaign
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
