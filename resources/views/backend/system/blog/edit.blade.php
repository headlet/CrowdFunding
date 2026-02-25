@extends('backend.system.layout.master')

@section('title')
    Fund | Edit Blog Post
@endsection
@include('backend.component.blog-type')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush


@section('content')
    <section class="min-h-screen p-3 bg-gray-100 md:p-2">
        <div class=" mx-auto">

            <!-- Header -->
            <div class="p-6 bg-white border-b rounded-t-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">
                            Edit Blog Post
                        </h2>
                        <p class="mt-1 text-sm text-gray-500">
                            Update existing article
                        </p>
                    </div>

                    <a href="{{ route('admin.blog.index') }}"
                        class="px-4 py-2 text-gray-600 transition-colors border border-gray-300 rounded-lg hover:text-gray-800 hover:bg-gray-50">
                        <i class="mr-2 fas fa-arrow-left"></i>Back
                    </a>
                </div>
            </div>

            <!-- Form -->
            <div class="p-6 bg-white rounded-b-lg shadow-md md:p-8">

                <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">

                    @csrf
                    @method('PUT')


                    <!-- Basic Information -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-info-circle"></i>
                            Basic Information
                        </h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Title <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="title" value="{{ old('title', $blog->title ?? '') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500"
                                    required id='title'>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Slug <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="slug" value="{{ old('slug', $blog->slug ?? '') }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500"
                                    required id="slug" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Author & Category -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-user"></i>
                            Details
                        </h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Author <span class="text-red-500">*</span>
                                </label>
                                <select name="user_id"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500"
                                    required>
                                    <option value="">Select Author</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id', $blog->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                            {{ $user->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Category <span class="text-red-500">*</span>
                                </label>
                                <select name="category_id"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500"
                                    required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-align-left"></i>
                            Content
                        </h3>

                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Excerpt <span class="text-red-500">*</span>
                        </label>
                        <textarea name="excerpt" rows="3"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500" required>{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>

                        <label class="block mt-4 mb-2 text-sm font-medium text-gray-700">
                            Full Content <span class="text-red-500">*</span>
                        </label>
                        <textarea name="content" rows="12"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500" required>{{ old('content', $blog->content ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror"
                            required>
                            @foreach (['draft', 'published', 'archived'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status', $blog->status ?? 'draft') == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Featured Image -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-image"></i>
                            Featured Image
                        </h3>

                        <input type="file" name="image" accept="image/*" id="imageInput"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5">

                        @if (isset($blog) && $blog->image)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $blog->image) }}"
                                    class="object-cover w-48 h-32 rounded-lg border">
                                <p class="mt-1 text-xs text-gray-500">Current image</p>
                            </div>
                        @endif

                        <img id="imagePreview" src="#" class="hidden object-cover w-48 h-32 mt-3 rounded-lg border">
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col gap-3 pt-6 border-t sm:flex-row ">
                        <button type="submit"
                            class="flex items-center justify-center px-6 py-3 text-white bg-blue-600 rounded-lg">
                            <i class="mr-2 fas fa-save"></i>
                            {{ isset($blog) ? 'Update Blog' : 'Create Blog' }}
                        </button>

                        <a href="{{ route('admin.blog.index') }}"
                            class="px-6 py-3 text-center text-gray-700 bg-gray-200 rounded-lg">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <!-- Image Preview Script -->
    <script>
        document.getElementById('imageInput').addEventListener('change', function() {
            const preview = document.getElementById('imagePreview');

            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>

    @include('backend.component.slug')
@endsection
