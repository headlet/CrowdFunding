@extends('backend.system.layout.master')

@section('title', isset($resources) ? 'Edit About Charity' : 'Add About Charity')
@include('backend.component.front-type')
@section('content')
<div class="p-6 bg-white rounded-xl shadow-md">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">
            {{ isset($resources) ? 'Edit About Charity' : 'Add About Charity' }}
        </h2>
    </div>

    <form action="{{ isset($resources) ? route('admin.about-charity.update', $resources->id) : route('admin.about-charity.store') }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($resources))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Main Title -->
            <div class="md:col-span-2">
                <label class="block mb-2 font-medium text-gray-700">Title *</label>
                <input type="text" name="title" 
                       value="{{ old('title', $resources->title ?? '') }}" 
                       placeholder="Enter main title" 
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-emerald-200">
            </div>

            <!-- Description with Quill -->
            <div class="md:col-span-2">
                <label class="block mb-2 font-medium text-gray-700">Description</label>
                <div id="editor" class="bg-white border rounded-lg" style="height:250px;">
                    {!! old('description', $resources->description ?? '') !!}
                </div>
                <input type="hidden" name="description" id="description">
            </div>

            <!-- Box Titles -->
            <div>
                <label class="block mb-2 font-medium text-gray-700">Box 1 Title</label>
                <input type="text" name="box1_title" 
                       value="{{ old('box1_title', $resources->box1_title ?? '') }}" 
                       placeholder="Enter first box title"
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-emerald-200">
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">Box 2 Title</label>
                <input type="text" name="box2_title" 
                       value="{{ old('box2_title', $resources->box2_title ?? '') }}" 
                       placeholder="Enter second box title"
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-emerald-200">
            </div>

            <!-- Image Upload -->
            <div class="md:col-span-2">
                <label class="block mb-2 font-medium text-gray-700">
                    Image {{ isset($resources) && $resources->image ? '(Current below)' : '' }}
                </label>
                <input type="file" name="image" class="w-full border p-2 rounded-lg">

                @if(isset($resources) && $resources->image)
                    <img src="{{ asset('storage/' . $resources->image) }}" 
                         class="w-32 h-32 object-cover rounded mt-3">
                @endif
            </div>

            <!-- Active Checkbox -->
            <div class="md:col-span-2 flex items-center gap-3 mt-2">
                <input type="checkbox" name="is_active" value="1" 
                       class="w-4 h-4" 
                       {{ old('is_active', $resources->is_active ?? true) ? 'checked' : '' }}>
                <label class="font-medium text-gray-700">Active</label>
            </div>

        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" 
                    class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">
                {{ isset($resources) ? 'Update About Charity' : 'Add About Charity' }}
            </button>
        </div>

    </form>
</div>

{{-- Quill Editor --}}
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                ['link', 'image'],
                [{ list: 'ordered' }, { list: 'bullet' }]
            ]
        }
    });

    // Set initial content from DB or old input
    quill.root.innerHTML = `{!! old('description', $resources->description ?? '') !!}`;

    // Sync Quill content to hidden input before submit
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('description').value = quill.root.innerHTML;
    });
</script>
@endsection