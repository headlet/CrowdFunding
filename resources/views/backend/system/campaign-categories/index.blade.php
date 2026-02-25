@extends('backend.system.layout.master')
@section('title')
    Fund | Campaign categories
@endsection
@include('backend.component.campaign-type')
@section('content')
    <section class="min-h-screen p-2 bg-gray-100 md:p-2">
         <!-- Header -->
            <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Campaign Categories</h2>
                        <p class="mt-1 text-sm text-gray-500">Manage your Campaign categories</p>
                    </div>
                    <a href="{{ route('admin.campaign-category.create') }}"
                       class="block w-full md:w-auto text-center px-6 py-2.5 bg-gradient-to-b from-emerald-500 to-emerald-600 hover:from-emerald-800 hover:to-emerald-600 text-white rounded-lg transition-all duration-300 font-medium shadow-md">
                        <i class="mr-2 fas fa-plus"></i>Add Campaign Category
                    </a>
                </div>
            </div>

        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase lg:px-6">
                                <a href="{{ route('admin.campaign-category.index', [
                                    'sort' => 'name',
                                    'direction' => request('direction') === 'asc' ? 'desc' : 'asc',
                                ]) }}"
                                    class="flex items-center gap-1">

                                    Campaign Category <i class="fa-solid fa-arrows-up-down"></i>

                                    @if (request('sort') === 'name')
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
                                Status
                            </th>
                            <th
                                class="px-4 py-4 text-xs font-semibold tracking-wider text-center text-gray-700 uppercase lg:px-6">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($resources as $category)
                            <tr class="transition-colors hover:bg-gray-50 ">
                                <!-- Campaign Catgories -->
                                <td class="px-4 py-4 lg:px-6 ">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-1 min-w-0">
                                            <div
                                                class="w-48 text-sm font-semibold text-gray-900 truncate transition-colors hover:text-blue-600">
                                                {{ $category->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Status -->
                                <td class="px-4 py-4 text-center lg:px-6">
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
                                <td class="px-4 py-4 lg:px-6">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.campaign-category.edit', $category->id) }}"
                                            class="p-2 text-blue-600 transition-colors rounded-lg hover:bg-blue-50"
                                            title="Edit">
                                            <i class="text-lg fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.campaign-category.destroy', $category->id) }}"
                                            method="POST" class="inline"
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
                                        <p class="text-lg font-medium text-gray-500">No campaigns Category found</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
    </section>
@endsection
