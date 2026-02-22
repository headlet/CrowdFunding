@extends('backend.system.layout.master')
@section('title') Edit Image @endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
<section class="min-h-screen p-6 md:p-10 bg-slate-100">
    <div class="max-w-2xl mx-auto">

        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('admin.gallery.index') }}" class="hover:text-emerald-600 transition-colors">Gallery</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-slate-800 font-medium">Edit Image</span>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden">

            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-8 py-6 flex items-center gap-5">
                <img src="{{ asset('storage/' . $resource->image) }}" alt="{{ $resource->title }}"
                    id="headerThumb"
                    class="w-16 h-16 rounded-xl object-cover border-2 border-white/30 flex-shrink-0">
                <div class="min-w-0">
                    <h1 class="text-2xl font-bold text-white mb-0.5">Edit Image</h1>
                    <p class="text-emerald-200 text-sm truncate">{{ $resource->title }}</p>
                    <p class="text-emerald-300 text-xs mt-0.5">Uploaded {{ $resource->created_at->diffForHumans() }}</p>
                </div>
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

                <form action="{{ route('admin.gallery.update', $resource->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Current Image -->
                    <div class="border-b border-slate-100 pb-6">
                        <p class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-4">
                            <i class="fas fa-image mr-2"></i>Image
                        </p>

                        <!-- Current image preview -->
                        <div class="flex items-start gap-4 bg-slate-50 rounded-xl p-4 mb-4">
                            <img src="{{ asset('storage/' . $resource->image) }}" alt="{{ $resource->title }}"
                                class="w-28 h-20 object-cover rounded-lg border border-slate-200 flex-shrink-0">
                            <div>
                                <p class="text-sm font-medium text-slate-700">Current Image</p>
                                <p class="text-xs text-slate-400 mt-0.5 break-all">{{ $resource->image }}</p>
                                <p class="text-xs text-slate-400 mt-2">Upload a new image below to replace it.</p>
                            </div>
                        </div>

                        <!-- New image drop zone -->
                        <div id="dropZone"
                            class="relative border-2 border-dashed border-slate-200 rounded-xl bg-slate-50 hover:border-emerald-400 hover:bg-emerald-50 transition-colors text-center p-8 cursor-pointer">
                            <input type="file" name="image" id="imageInput" accept="image/*"
                                class="absolute inset-0 opacity-0 cursor-pointer w-full h-full">

                            <div id="dropZoneContent">
                                <div class="w-11 h-11 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-xl mx-auto mb-3">
                                    <i class="fas fa-arrow-up-from-bracket"></i>
                                </div>
                                <p class="text-sm font-medium text-slate-600 mb-1">Replace image</p>
                                <p class="text-xs text-slate-400">JPG, PNG, GIF, WEBP — Max 2MB</p>
                            </div>

                            <div id="newPreviewBox" class="hidden mt-3">
                                <img id="newPreview" src="#" alt="New preview"
                                    class="max-h-48 rounded-xl mx-auto object-contain shadow-md">
                                <p id="newFileName" class="text-xs text-slate-500 mt-2"></p>
                            </div>
                        </div>

                        @error('image') <p class="text-xs text-red-500 mt-2">{{ $message }}</p> @enderror
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
                                <input type="text" name="title" id="titleInput" maxlength="100"
                                    value="{{ old('title', $resource->title) }}"
                                    class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent @error('title') border-red-400 @enderror"
                                    placeholder="Enter image title">
                                <div class="text-right text-xs text-slate-400 mt-1">
                                    <span id="titleCount">{{ strlen($resource->title) }}</span>/100
                                </div>
                                @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Alt Text</label>
                                <input type="text" name="alt_text"
                                    value="{{ old('alt_text', $resource->alt_text ?? '') }}"
                                    class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent @error('alt_text') border-red-400 @enderror"
                                    placeholder="Describe the image for accessibility">
                                @error('alt_text') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Caption</label>
                                <textarea name="caption" rows="2"
                                    class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent @error('caption') border-red-400 @enderror"
                                    placeholder="Optional caption">{{ old('caption', $resource->caption ?? '') }}</textarea>
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
                                    class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent @error('category_id') border-red-400 @enderror">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ old('category_id', $resource->category_id) == $cat->id ? 'selected' : '' }}>
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
                                    class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent @error('status') border-red-400 @enderror">
                                    <option value="1" {{ old('status', $resource->status) == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $resource->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Sort Order</label>
                                <input type="number" name="sort_order" min="0"
                                    value="{{ old('sort_order', $resource->sort_order ?? 0) }}"
                                    class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            </div>

                            <div class="flex items-center gap-3 pt-6">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="hidden" name="featured" value="0">
                                    <input type="checkbox" name="featured" value="1" class="sr-only peer"
                                        {{ old('featured', $resource->featured ?? false) ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-emerald-500
                                        after:content-[''] after:absolute after:top-0.5 after:left-0.5
                                        after:bg-white after:rounded-full after:h-5 after:w-5
                                        after:transition-all peer-checked:after:translate-x-5"></div>
                                    <span class="ml-3 text-sm font-medium text-slate-700">Featured Image</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-wrap items-center gap-3 pt-4 border-t border-slate-100">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg transition-colors">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                        <a href="{{ route('admin.gallery.index') }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 text-sm font-medium rounded-lg transition-colors">
                            <i class="fas fa-times"></i> Cancel
                        </a>

                        <!-- Delete on the right -->
                        <form action="{{ route('admin.gallery.destroy', $resource->id) }}" method="POST"
                              class="ml-auto" onsubmit="return confirm('Delete this image permanently?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-50 hover:bg-red-100 text-red-600 border border-red-200 text-sm font-medium rounded-lg transition-colors">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(function () {
    // New image preview + update header thumbnail live
    $('#imageInput').on('change', function () {
        const file = this.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (e) {
            $('#dropZoneContent').addClass('hidden');
            $('#newPreview').attr('src', e.target.result);
            $('#newFileName').text(file.name + ' (' + (file.size / 1024).toFixed(1) + ' KB)');
            $('#newPreviewBox').removeClass('hidden');
            $('#headerThumb').attr('src', e.target.result); // live header update
        };
        reader.readAsDataURL(file);
    });

    // Drag over styling
    $('#dropZone').on('dragover dragenter', function (e) {
        e.preventDefault();
        $(this).removeClass('border-slate-200').addClass('border-emerald-400 bg-emerald-50');
    }).on('dragleave drop', function () {
        $(this).addClass('border-slate-200').removeClass('border-emerald-400 bg-emerald-50');
    });

    // Char counter
    $('#titleInput').on('input', function () {
        $('#titleCount').text($(this).val().length);
    });
});
</script>
@endsection