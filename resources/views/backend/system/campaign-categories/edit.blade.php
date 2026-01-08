@extends('backend.system.layout.master')

@section('title')
    Edit Campaign Category
@endsection

@section('content')
    <section class="min-h-screen p-4 bg-gray-100 md:p-8">
        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="p-6 bg-white border-b rounded-t-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Add New Campaign Category</h2>
                    </div>
                    <a href="{{ route('admin.campaign-category.index') }}"
                        class="px-4 py-2 text-gray-600 transition-colors border border-gray-300 rounded-lg hover:text-gray-800 hover:bg-gray-50">
                        <i class="mr-2 fas fa-arrow-left"></i>Back
                    </a>
                </div>
            </div>

            <!-- Form -->
            <div class="p-6 bg-white rounded-b-lg shadow-md md:p-8">

                @if ($errors->any())
                    <div class="p-4 mb-6 border-l-4 border-red-500 rounded bg-red-50">
                        <div class="flex">
                            <i class="fas fa-exclamation-circle text-red-500 mt-0.5 mr-3"></i>
                            <div>
                                <h3 class="font-semibold text-red-800">Please correct the following errors:</h3>
                                <ul class="mt-2 space-y-1 text-sm text-red-700 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.campaign-category.update', $category->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <!-- Basic Information Section -->
                    <div class="pb-6 border-b">
                        <!-- Title & Slug -->
                        <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Title <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                                    placeholder="Enter Category" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Slug <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="slug" value="{{ old('slug', $category->slug) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                                    placeholder="campaign-slug" required>
                                @error('slug')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Description Section -->
                        <div class="pb-6 border-b">
                            <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                                <i class="mr-2 text-blue-500 fas fa-align-left"></i>
                                Description
                            </h3>
                            <!--Description -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Description <span class="text-red-500">*</span>
                                </label>
                                <textarea name="description" rows="6"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                                    placeholder="Detailed description of the campaign" required>{{ old('description', $category->description) }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Settings Section -->
                        <div>
                            <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                                <i class="mr-2 text-blue-500 fas fa-cog"></i>
                                Settings
                            </h3>

                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Status <span class="text-red-500">*</span>
                                    </label>
                                    <select name="status"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror"
                                        required>
                                        @foreach ([1 => 'Active', 0 => 'Inactive'] as $value => $label)
                                            <option value="{{ $value }}"
                                                {{ old('status', $category->status) == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('status')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col gap-3 pt-6 border-t sm:flex-row">
                <button type="submit"
                    class="flex items-center justify-center px-6 py-3 font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                    <i class="mr-2 fas fa-save"></i>Update Category
                </button>
                <a href="{{ route('admin.campaign-category.index') }}"
                    class="px-6 py-3 font-medium text-center text-gray-700 transition-colors bg-gray-200 rounded-lg hover:bg-gray-300">
                    Cancel
                </a>
            </div>

            </form>
        </div>
        </div>
    </section>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection
