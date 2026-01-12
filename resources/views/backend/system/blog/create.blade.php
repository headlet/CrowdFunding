@extends('backend.system.layout.master')

@section('title')
    Add Blog Post
@endsection

@section('content')
    <section class="min-h-screen p-4 bg-gray-100 md:p-8">
        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="p-6 bg-white border-b rounded-t-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Add New Blog Post</h2>
                        <p class="mt-1 text-sm text-gray-500">Create a new blog article</p>
                    </div>
                    <a href="{{ route('admin.blog.index') }}"
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

                <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <!-- Basic Information Section -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-info-circle"></i>
                            Basic Information
                        </h3>

                        <!-- Title & Slug -->
                        <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Title <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="title" value="{{ old('title') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                                    placeholder="Enter blog post title" required>
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Slug <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="slug" value="{{ old('slug') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                                    placeholder="blog-post-slug" required>
                                @error('slug')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Author & Category -->
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Author <span class="text-red-500">*</span>
                                </label>
                                <select name="user_id"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('user_id') border-red-500 @enderror"
                                    required>
                                    <option value="">Select Author</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Category <span class="text-red-500">*</span>
                                </label>
                                <select name="category_id"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category_id') border-red-500 @enderror"
                                    required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-align-left"></i>
                            Content
                        </h3>

                        <!-- Excerpt -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Excerpt <span class="text-red-500">*</span>
                            </label>
                            <textarea name="excerpt" rows="3"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('excerpt') border-red-500 @enderror"
                                placeholder="Brief summary of the blog post" required>{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Full Content -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Content <span class="text-red-500">*</span>
                            </label>
                            <textarea name="content" rows="12"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('content') border-red-500 @enderror"
                                placeholder="Full blog post content" required>{{ old('content') }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Media Section -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-image"></i>
                            Featured Image
                        </h3>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Upload Image
                            </label>
                            <input type="file" name="image" accept="image/*"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('image') border-red-500 @enderror">
                            <p class="mt-1 text-xs text-gray-500">Accepted formats: JPG, PNG, GIF (Max: 2MB)</p>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Publishing Settings Section -->
                    <div>
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-cog"></i>
                            Publishing Settings
                        </h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select name="status"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror"
                                    required>
                                    @foreach (['draft', 'published', 'archived'] as $status)
                                        <option value="{{ $status }}"
                                            {{ old('status', 'draft') == $status ? 'selected' : '' }}>
                                            {{ ucfirst($status) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Publish Date
                                </label>
                                <input type="datetime-local" name="published_at" value="{{ old('published_at') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('published_at') border-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">Leave empty to publish immediately</p>
                                @error('published_at')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col gap-3 pt-6 border-t sm:flex-row">
                        <button type="submit"
                            class="flex items-center justify-center px-6 py-3 font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                            <i class="mr-2 fas fa-save"></i>Create Blog Post
                        </button>
                        <a href="{{ route('admin.blog.index') }}"
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
