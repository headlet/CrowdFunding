@extends('backend.system.layout.master')
@section('title')
    Campaign categories
@endsection

@section('content')
    <section class="bg-gray-100 min-h-screen p-4 md:p-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-end items-stretch md:items-center mb-6 gap-3">
            <a href="{{ route('campaign-category.create') }}"
                class="px-6 py-2.5 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors text-center font-medium whitespace-nowrap">
                <i class="fas fa-plus mr-2"></i>Add Campaign Category
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Campaign Category
                            </th>
                            <th
                                class="px-4 lg:px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-4 lg:px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($resources as $category)
                            <tr class="hover:bg-gray-50 transition-colors ">
                                <!-- Campaign Catgories -->
                                <td class="px-4 lg:px-6 py-4 ">
                                    <div class="flex items-center gap-3">
                                        <div class="min-w-0 flex-1">
                                            <div
                                                class="text-sm font-semibold text-gray-900 truncate hover:text-blue-600 transition-colors w-48">
                                                {{ $category->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Status -->
                                <td class="px-4 lg:px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                        {{ $category->status == '1' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        <span
                                            class="w-1.5 h-1.5 rounded-full mr-1.5 
                                            {{ $category->status == '1' ? 'bg-green-500' : 'bg-red-500' }}">
                                        </span>
                                        {{ ucfirst($category->status == 1 ? 'active' : 'Inactive') ?? ucfirst($category->status) }}
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td class="px-4 lg:px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('campaign-category.edit', $category->id) }}"
                                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                            title="Edit">
                                            <i class="fas fa-edit text-lg"></i>
                                        </a>
                                        <form action="{{ route('campaign-category.destroy', $category->id) }}"
                                            method="POST" class="inline"
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
                                        <p class="text-gray-500 text-lg font-medium">No campaigns Category found</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
    </section>
@endsection
