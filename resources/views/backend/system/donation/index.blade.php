@extends('backend.system.layout.master')

@section('title')
    Donations
@endsection

@section('content')
    <section class="min-h-screen p-4 bg-gray-100 md:p-8">

        <div class="flex flex-col items-stretch justify-end gap-3 mb-6 md:flex-row md:items-center">
        </div>

        <div class="overflow-hidden bg-white rounded-lg shadow-md min-h-screen">
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-4 text-xs font-semibold text-left text-gray-700 uppercase lg:px-6">
                                Campaign
                            </th>
                            <th class="px-4 py-4 text-xs font-semibold text-left text-gray-700 uppercase lg:px-6">
                                Donor
                            </th>
                            <th class="px-4 py-4 text-xs font-semibold text-center text-gray-700 uppercase lg:px-6">
                                Amount
                            </th>
                            <th class="px-4 py-4 text-xs font-semibold text-center text-gray-700 uppercase lg:px-6">
                                Status
                            </th>
                            <th class="px-4 py-4 text-xs font-semibold text-center text-gray-700 uppercase lg:px-6">
                                Date
                            </th>
                            <th class="px-4 py-4 text-xs font-semibold text-center text-gray-700 uppercase lg:px-6">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($resources['donation'] as $donation)
                            <tr class="transition-colors hover:bg-gray-50">

                                <!-- Campaign -->
                                <td class="px-4 py-4 lg:px-6">
                                    <div class="text-sm font-semibold text-gray-900">
                                        {{ $donation->campaign->title ?? '-' }}
                                    </div>
                                </td>

                                <!-- Donor -->
                                <td class="px-4 py-4 lg:px-6">
                                    @if ($donation->is_anonymous)
                                        <span class="italic text-gray-400">Anonymous</span>
                                    @else
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $donation->donor_name }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $donation->donor_email }}
                                        </div>
                                    @endif
                                </td>

                                <!-- Amount -->
                                <td class="px-4 py-4 font-semibold text-center lg:px-6">
                                    {{ $donation->currency }}
                                    {{ number_format($donation->amount, 2) }}
                                </td>

                                <!-- Status -->
                                <td class="px-4 py-4 text-center lg:px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                    @if ($donation->status === 'completed') bg-green-100 text-green-800
                                    @elseif ($donation->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif ($donation->status === 'failed') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                        <span
                                            class="w-1.5 h-1.5 rounded-full mr-1.5
                                        @if ($donation->status === 'completed') bg-green-500
                                        @elseif ($donation->status === 'pending') bg-yellow-500
                                        @elseif ($donation->status === 'failed') bg-red-500
                                        @else bg-gray-400 @endif">
                                        </span>
                                        {{ ucfirst($donation->status) }}
                                    </span>
                                </td>

                                <!-- Date -->
                                <td class="px-4 py-4 text-sm text-center text-gray-600 lg:px-6">
                                    {{ $donation->created_at->format('Y-m-d') }}
                                </td>

                                <!-- Actions -->
                                <td class="px-4 py-4 lg:px-6">
                                    <div class="flex items-center justify-center">
                                        <form action="route('admin.donations.destroy', $donation->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this donation?');">
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
                                <td colspan="6" class="px-4 py-12 text-center ">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="mb-4 text-5xl text-gray-300 fas fa-donate"></i>
                                        <p class="text-lg font-medium text-gray-500">
                                            No donations found
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-4">
                {{ $resources['donation']->withQueryString()->links() }}
            </div>

        </div>
    </section>
@endsection
