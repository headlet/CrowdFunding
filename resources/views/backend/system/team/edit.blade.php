@extends('backend.system.layout.master')

@section('title')
    Edit Team Member
@endsection

@section('content')
    <section class="min-h-screen p-4 bg-gray-100 md:p-8">
        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="p-6 bg-white border-b rounded-t-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Edit Team Member</h2>
                        <p class="mt-1 text-sm text-gray-500">Update team member profile</p>
                    </div>
                    <a href="{{ route('admin.team.index') }}"
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

                <form action="{{ route('admin.team.update', $team->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-info-circle"></i>
                            Basic Information
                        </h3>

                        <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name', $team->name) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                                    placeholder="Enter full name" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Designation <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="designation"
                                    value="{{ old('designation', $team->designation) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('designation') border-red-500 @enderror"
                                    placeholder="e.g., CEO, Manager" required>
                                @error('designation')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Profile Image
                                </label>
                                <input type="file" name="image" accept="image/*"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('image') border-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">Accepted formats: JPG, PNG, GIF (Max: 2MB)</p>
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                @if ($team->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}"
                                            class="object-cover w-20 h-20 border border-gray-300 rounded-lg">
                                        <p class="mt-1 text-xs text-gray-500">Current image</p>
                                    </div>
                                @endif
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select name="status"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror"
                                    required>
                                    <option value="1" {{ old('status', $team->status) == '1' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="0" {{ old('status', $team->status) == '0' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Bio Section -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-align-left"></i>
                            Biography
                        </h3>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Bio
                            </label>
                            <textarea name="bio" rows="4"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('bio') border-red-500 @enderror"
                                placeholder="Write a brief biography about the team member">{{ old('bio', $team->bio) }}</textarea>
                            @error('bio')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Social Media Section -->
                    <div>
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-share-alt"></i>
                            Social Media Links
                        </h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Facebook URL
                                </label>
                                <input type="url" name="facebook" value="{{ old('facebook', $team->facebook) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('facebook') border-red-500 @enderror"
                                    placeholder="https://facebook.com/username">
                                @error('facebook')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Twitter URL
                                </label>
                                <input type="url" name="twitter" value="{{ old('twitter', $team->twitter) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('twitter') border-red-500 @enderror"
                                    placeholder="https://twitter.com/username">
                                @error('twitter')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    LinkedIn URL
                                </label>
                                <input type="url" name="linkedin" value="{{ old('linkedin', $team->linkedin) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('linkedin') border-red-500 @enderror"
                                    placeholder="https://linkedin.com/in/username">
                                @error('linkedin')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col gap-3 pt-6 border-t sm:flex-row">
                        <button type="submit"
                            class="flex items-center justify-center px-6 py-3 font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                            <i class="mr-2 fas fa-save"></i>Update Team Member
                        </button>
                        <a href="{{ route('admin.team.index') }}"
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
