@extends('backend.system.layout.master')

@section('title', 'Fund | About Us')
@include('backend.component.front-type')
@section('content')
    <section class="min-h-screen p-6 bg-gray-100">

        <!-- Page Header -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">About Us</h2>
            <p class="text-gray-600 mt-1">Manage your organization's About Us content here.</p>
        </div>

        <!-- Form Container -->
        <div class="p-6 bg-white rounded-xl shadow-md">

            <form action="{{ isset($resources) ? route('admin.about.update', $resources->id) : route('admin.about.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($resources))
                    @method('PUT')
                @endif

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block mb-2 font-medium text-gray-700">Title <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $resources->title ?? '') }}"
                        placeholder="Enter title"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                        required>
                </div>

                <!-- Images -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Background Image -->
                    <div>
                        <label class="block mb-2 font-medium text-gray-700">Background Image</label>
                        <input type="file" name="bg_image"
                            class="block w-full text-sm text-gray-600 border rounded-lg p-2">
                        @if (isset($resources->bg_image))
                            <img src="{{ asset('storage/' . $resources->bg_image) }}"
                                class="w-32 h-20 object-cover rounded mt-3" alt="Background Image">
                        @endif
                    </div>

                    <!-- About Image -->
                    <div>
                        <label class="block mb-2 font-medium text-gray-700">About Image</label>
                        <input type="file" name="about_image"
                            class="block w-full text-sm text-gray-600 border rounded-lg p-2">
                        @if (isset($resources->about_image))
                            <img src="{{ asset('storage/' . $resources->about_image) }}"
                                class="w-32 h-20 object-cover rounded mt-3" alt="About Image">
                        @endif
                    </div>
                </div>

                <!-- Video Link -->
                <div class="mb-6">
                    <label for="video_link" class="block mb-2 font-medium text-gray-700">Video Link (YouTube, Vimeo,
                        etc.)</label>
                    <input type="url" name="video_link" id="video_link"
                        value="{{ old('video_link', $resources->video_link ?? '') }}" placeholder="Enter video URL"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @if (isset($resources->video_link) && !empty($resources->video_link))
                        <div class="mt-3">
                            @php
                                $embedUrl = $resources->video_link;
                                if (str_contains($embedUrl, 'watch?v=')) {
                                    $embedUrl = str_replace('watch?v=', 'embed/', $embedUrl);
                                }
                            @endphp
                            <iframe width="100%" height="300" src="{{ $embedUrl }}" class="rounded-lg shadow-sm"
                                frameborder="0" allowfullscreen loading="lazy"></iframe>
                        </div>
                    @endif
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block mb-2 font-medium text-gray-700">Description <span
                            class="text-red-500">*</span></label>

                    <!-- Quill Editor -->
                    <div id="editor" class="bg-white border rounded-lg" style="height:250px;">
                        {!! old('description', $resources->description ?? '') !!}
                    </div>
                    <input type="hidden" name="description" id="description">
                </div>

                <!-- Active Checkbox -->
                <div class="mb-6 flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                        {{ old('is_active', $resources->is_active ?? true) ? 'checked' : '' }}
                        class="w-5 h-5 text-emerald-600 rounded border-gray-300 focus:ring-2 focus:ring-emerald-500">
                    <label for="is_active" class="font-medium text-gray-700">Active</label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="px-6 py-2.5 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 shadow-md transition duration-300">
                        {{ isset($resources) ? 'Update About Us' : 'Add About Us' }}
                    </button>
                </div>

            </form>
        </div>

        @include('backend.component.slug')

        <!-- Quill JS -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'],
                        ['link', 'image'],
                        [{
                            list: 'ordered'
                        }, {
                            list: 'bullet'
                        }]
                    ]
                }
            });

            // Set content from DB / old input
            quill.root.innerHTML = `{!! old('description', $resources->description ?? '') !!}`;

            // Sync Quill content to hidden input before submit
            document.querySelector('form').addEventListener('submit', function() {
                document.getElementById('description').value = quill.root.innerHTML;
            });
        </script>

    </section>
@endsection
