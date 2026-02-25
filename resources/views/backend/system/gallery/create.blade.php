@extends('backend.system.layout.master')
@section('title') Fund | Upload Image @endsection
@include('backend.component.gallery-type')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
<section class="min-h-screen p-6 md:p-10 bg-slate-100">
    <div class="max-w-2xl mx-auto">

        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('admin.gallery.index') }}" class="hover:text-blue-600 transition-colors">Gallery</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-slate-800 font-medium">Upload Image</span>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden">

            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-800 to-blue-600 px-8 py-6">
                <h1 class="text-2xl font-bold text-white mb-1">Upload New Image</h1>
                <p class="text-blue-200 text-sm">Add a new image to your gallery collection</p>
            </div>

            <!-- Body -->
            <div class="p-8">

                @if ($errors->any())
                    <div class="flex gap-3 bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                        <i class="fas fa-exclamation-circle text-red-400 mt-0.5 text-sm"></i>
                        <div>
                            <p class="text-sm font-semibold text-red-800 mb-1">Please fix the following errors:</p>
                            <ul class="text-sm text-red-600 space-y-0.5 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <!-- Image Upload -->
                    <div class="border-b border-slate-100 pb-6">
                        <p class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-4">
                            <i class="fas fa-image mr-2"></i>Image
                        </p>

                        <div id="dropZone"
                            class="relative border-2 border-dashed border-slate-200 rounded-xl bg-slate-50 hover:border-blue-400 hover:bg-blue-50 transition-colors text-center p-12 cursor-pointer">
                            <input type="file" name="image" id="imageInput" accept="image/*"
                                class="absolute inset-0 opacity-0 cursor-pointer w-full h-full">

                            <div id="dropZoneContent">
                                <div class="w-14 h-14 bg-blue-100 text-blue-500 rounded-xl flex items-center justify-center text-2xl mx-auto mb-4">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <p class="text-sm font-medium text-slate-700 mb-1">Drag & drop or click to upload</p>
                                <p class="text-xs text-slate-400">JPG, PNG, GIF, WEBP — Max 2MB</p>
                            </div>

                            <div id="imagePreviewBox" class="hidden mt-4">
                                <img id="imagePreview" src="#" alt="Preview"
                                    class="max-h-56 rounded-xl mx-auto object-contain shadow-md">
                                <p id="fileName" class="text-xs text-slate-500 mt-2"></p>
                            </div>
                        </div>

                        @error('image')
                            <p class="text-xs text-red-500 mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Details -->
                    <div class="border-b border-slate-100 pb-6">
                        <p class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-4">
                            <i class="fas fa-info-circle mr-2"></i>Details
                        </p>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Title <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="title" maxlength="100" id="titleInput"
                                    value="{{ old('title') }}"
                                    class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-400 @enderror"
                                    placeholder="Enter image title">
                                <div class="text-right text-xs text-slate-400 mt-1"><span id="titleCount">0</span>/100</div>
                                @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Alt Text</label>
                                <input type="text" name="alt_text" value="{{ old('alt_text') }}"
                                    class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('alt_text') border-red-400 @enderror"
                                    placeholder="Describe the image for accessibility">
                                @error('alt_text') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Caption</label>
                                <textarea name="caption" rows="2"
                                    class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('caption') border-red-400 @enderror"
                                    placeholder="Optional caption">{{ old('caption') }}</textarea>
                                @error('caption') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Settings -->
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-4">
                            <i class="fas fa-cog mr-2"></i>Settings
                        </p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Category</label>
                                <select name="category_id"
                                    class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category_id') border-red-400 @enderror">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select name="status"
                                    class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-400 @enderror">
                                    <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Sort Order</label>
                                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                                    class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>

                            <div class="flex items-center gap-3 pt-6">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="hidden" name="featured" value="0">
                                    <input type="checkbox" name="featured" value="1" class="sr-only peer"
                                        {{ old('featured') ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-blue-600
                                        after:content-[''] after:absolute after:top-0.5 after:left-0.5
                                        after:bg-white after:rounded-full after:h-5 after:w-5
                                        after:transition-all peer-checked:after:translate-x-5"></div>
                                    <span class="ml-3 text-sm font-medium text-slate-700">Featured Image</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-colors">
                            <i class="fas fa-cloud-upload-alt"></i> Upload Image
                        </button>
                        <a href="{{ route('admin.gallery.index') }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 text-sm font-medium rounded-lg transition-colors">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(function () {
    // Image preview
    $('#imageInput').on('change', function () {
        const file = this.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (e) {
            $('#dropZoneContent').addClass('hidden');
            $('#imagePreview').attr('src', e.target.result);
            $('#fileName').text(file.name + ' (' + (file.size / 1024).toFixed(1) + ' KB)');
            $('#imagePreviewBox').removeClass('hidden');
        };
        reader.readAsDataURL(file);
    });

    // Drag over styling
    $('#dropZone').on('dragover dragenter', function (e) {
        e.preventDefault();
        $(this).removeClass('border-slate-200').addClass('border-blue-400 bg-blue-50');
    }).on('dragleave drop', function () {
        $(this).addClass('border-slate-200').removeClass('border-blue-400 bg-blue-50');
    });

    // Char counter
    $('#titleInput').on('input', function () {
        $('#titleCount').text($(this).val().length);
    });
});
</script>
@endsection