@extends('backend.system.layout.master')

@section('title')
    Edit Blog Post
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')

<section class="min-h-screen p-4 bg-gray-100 md:p-8">
    <div class="max-w-5xl mx-auto">

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

                @if(isset($resource))
                    <span class="px-3 py-1 text-sm text-green-700 bg-green-100 rounded-full">
                        Editing
                    </span>
                @endif
            </div>
        </div>

        <!-- Form -->
        <div class="p-6 bg-white rounded-b-lg shadow-md md:p-8">

            @if ($errors->any())
                <div class="p-4 mb-6 border-l-4 border-red-500 rounded bg-red-50">
                    <div class="flex">
                        <i class="fas fa-exclamation-circle text-red-500 mt-0.5 mr-3"></i>
                        <div>
                            <h3 class="font-semibold text-red-800">Please fix errors</h3>
                            <ul class="mt-2 space-y-1 text-sm text-red-700 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ isset($resource) ? route('admin.blog.update', $resource->id) : route('admin.blog.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">

                @csrf
                @if (isset($resource))
                    @method('PUT')
                @endif

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
                            <input type="text" name="title"
                                   value="{{ old('title', $resource->title ?? '') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500"
                                   required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Slug <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="slug"
                                   value="{{ old('slug', $resource->slug ?? '') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500"
                                   required>
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
                                        {{ old('user_id', $resource->user_id ?? '') == $user->id ? 'selected' : '' }}>
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
                                        {{ old('category_id', $resource->category_id ?? '') == $category->id ? 'selected' : '' }}>
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
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500"
                              required>{{ old('excerpt', $resource->excerpt ?? '') }}</textarea>

                    <label class="block mt-4 mb-2 text-sm font-medium text-gray-700">
                        Full Content <span class="text-red-500">*</span>
                    </label>
                    <textarea name="content" rows="12"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500"
                              required>{{ old('content', $resource->content ?? '') }}</textarea>
                </div>

                <!-- Featured Image -->
                <div class="pb-6 border-b">
                    <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                        <i class="mr-2 text-blue-500 fas fa-image"></i>
                        Featured Image
                    </h3>

                    <input type="file" name="image" accept="image/*"
                           id="imageInput"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5">

                    @if (isset($resource) && $resource->image)
                        <div class="mt-3">
                            <img src="{{ asset('storage/' . $resource->image) }}"
                                 class="object-cover w-48 h-32 rounded-lg border">
                            <p class="mt-1 text-xs text-gray-500">Current image</p>
                        </div>
                    @endif

                    <img id="imagePreview" src="#"
                         class="hidden object-cover w-48 h-32 mt-3 rounded-lg border">
                </div>

                <!-- Actions -->
                <div class="flex flex-col gap-3 pt-6 border-t sm:flex-row">
                    <button type="submit"
                            class="flex items-center justify-center px-6 py-3 text-white bg-blue-600 rounded-lg">
                        <i class="mr-2 fas fa-save"></i>
                        {{ isset($resource) ? 'Update Blog' : 'Create Blog' }}
                    </button>

                    <a href="{{ route('admin.blog.index') }}"
                       class="px-6 py-3 text-center text-gray-700 bg-gray-200 rounded-lg">
                        Cancel
                    </a>

                    @if (isset($resource))
                        <form action="{{ route('admin.blog.destroy', $resource->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-6 py-3 text-white bg-red-600 rounded-lg">
                                Delete
                            </button>
                        </form>
                    @endif
                </div>

            </form>
        </div>
    </div>
</section>

<!-- Image Preview Script -->
<script>
    document.getElementById('imageInput').addEventListener('change', function () {
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

    // Auto generate slug (only if creating)
    @if (!isset($resource))
        document.querySelector('[name="title"]').addEventListener('input', function () {
            const slug = this.value
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

            document.querySelector('[name="slug"]').value = slug;
        });
    @endif
</script>
@endsection