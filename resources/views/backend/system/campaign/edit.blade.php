@extends('backend.system.layout.master')

@section('title')
    Fund | Edit Campaign
@endsection

@include('backend.component.campaign-type')

@section('content')
    <section class="min-h-screen p-2 bg-gray-100 md:p-2">
        <div class="max-w-6xl mx-auto">

            <!-- Header -->
            <div class="p-6 bg-white border-b rounded-t-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Edit Campaign</h2>
                        <p class="mt-1 text-sm text-gray-500">Update campaign details and settings</p>
                    </div>
                    <a href="{{ route('admin.campaigns.index') }}"
                        class="px-4 py-2 text-gray-600 transition-colors border border-gray-300 rounded-lg hover:text-gray-800 hover:bg-gray-50">
                        <i class="mr-2 fas fa-arrow-left"></i>Back
                    </a>
                </div>
            </div>

            <!-- Form -->
            <div class="p-6 bg-white rounded-b-lg shadow-md md:p-8">


                <form action="{{ route('admin.campaigns.update', $campaign->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $campaign->id }}">

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
                                <input type="text" name="title" value="{{ old('title', $campaign->title) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                                    placeholder="Enter campaign title" required id='title'>
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Slug <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="slug" value="{{ old('slug', $campaign->slug) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                                    placeholder="campaign-slug" required id="slug" readonly>
                                @error('slug')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- User & Category -->
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Campaign Owner <span class="text-red-500">*</span>
                                </label>
                                <select name="user_id"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('user_id') border-red-500 @enderror"
                                    required>
                                    <option value="">Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id', $campaign->user_id) == $user->id ? 'selected' : '' }}>
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
                                            {{ old('category_id', $campaign->category_id) == $category->id ? 'selected' : '' }}>
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

                    <!-- Description Section -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-align-left"></i>
                            Description
                        </h3>

                        <!-- Short Description -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Short Description <span class="text-red-500">*</span>
                            </label>
                            <textarea name="short_description" rows="2"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('short_description') border-red-500 @enderror"
                                placeholder="Brief overview of the campaign (max 500 characters)" maxlength="500" required>{{ old('short_description', $campaign->short_description) }}</textarea>
                            @error('short_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Full Description -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Full Description <span class="text-red-500">*</span>
                            </label>
                            <textarea name="description" rows="6"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                                placeholder="Detailed description of the campaign" required>{{ old('description', $campaign->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Financial Details Section -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-dollar-sign"></i>
                            Financial Details
                        </h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Goal Amount <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute text-gray-500 transform -translate-y-1/2 left-4 top-1/2">$</span>
                                    <input type="number" name="goal_amount"
                                        value="{{ old('goal_amount', $campaign->goal_amount) }}"
                                        class="w-full border border-gray-300 rounded-lg pl-8 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('goal_amount') border-red-500 @enderror"
                                        placeholder="0.00" step="0.01" min="0" required>
                                </div>
                                @error('goal_amount')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Section -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-calendar-alt"></i>
                            Timeline
                        </h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Start Date <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="start_date"
                                    value="{{ old('start_date', $campaign->start_date?->format('Y-m-d')) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('start_date') border-red-500 @enderror"
                                    required>
                                @error('start_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    End Date <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="end_date"
                                    value="{{ old('end_date', $campaign->end_date?->format('Y-m-d')) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('end_date') border-red-500 @enderror"
                                    required>
                                @error('end_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Location Section -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-map-marker-alt"></i>
                            Location
                        </h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Country <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="country" value="{{ old('country', $campaign->country) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('country') border-red-500 @enderror"
                                    placeholder="Enter country" required>
                                @error('country')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Address <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="address" value="{{ old('address', $campaign->address) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('address') border-red-500 @enderror"
                                    placeholder="Enter address" required>
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Media Section -->
                    <div class="pb-6 border-b">
                        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <i class="mr-2 text-blue-500 fas fa-image"></i>
                            Campaign Image
                        </h3>

                        <div>
                            @if ($campaign->image)
                                <div class="mb-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-700">Current Image</label>
                                    <div class="relative inline-block">
                                        <img src="{{ asset('storage/' . $campaign->image) }}"
                                            class="h-32 border border-gray-200 rounded-lg shadow-md" alt="Campaign Image">
                                        <div
                                            class="absolute px-2 py-1 text-xs text-white bg-green-500 rounded top-2 right-2">
                                            <i class="mr-1 fas fa-check"></i>Current
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                {{ $campaign->image ? 'Change Image' : 'Upload Image' }}
                            </label>
                            <input type="file" name="image" accept="image/*"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('image') border-red-500 @enderror">
                            <p class="mt-1 text-xs text-gray-500">Accepted formats: JPG, PNG, GIF (Max: 2MB)</p>
                            @error('image')
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
                                    @foreach (['draft', 'active', 'completed', 'cancelled'] as $status)
                                        <option value="{{ $status }}"
                                            {{ old('status', $campaign->status ?? '') == $status ? 'selected' : '' }}>
                                            {{ ucfirst($status) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Featured Campaign
                            </label>
                            <div class="flex items-center h-[42px] bg-gray-50 rounded-lg px-4 border border-gray-300">
                                <input type="hidden" name="is_featured" value="0">
                                <input type="checkbox" name="is_featured" value="1" id="is_featured"
                                    {{ old('is_featured', $campaign->is_featured) ? 'checked' : '' }}
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
                                <label for="is_featured" class="ml-3 text-sm text-gray-700 cursor-pointer">
                                    Mark as featured campaign
                                </label>
                            </div>
                            @error('is_featured')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col gap-3 pt-6 border-t sm:flex-row">
                <button type="submit"
                    class="flex items-center justify-center px-6 py-3 font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                    <i class="mr-2 fas fa-save"></i>Update Campaign
                </button>
                <a href="{{ route('admin.campaigns.index') }}"
                    class="px-6 py-3 font-medium text-center text-gray-700 transition-colors bg-gray-200 rounded-lg hover:bg-gray-300">
                    Cancel
                </a>
            </div>

            </form>
        </div>
        </div>
    </section>
    @include('backend.component.slug')
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection
