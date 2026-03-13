@extends('backend.system.layout.master')

@section('title', 'General Settings')
@section('link')
    <a @if (!request()->routeIs('admin.general-setting')) href="{{ route('admin.general-setting.index') }}" @endif
        class="py-1 transition-all
    {{ request()->routeIs('admin.general-setting.index')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : '' }}">
        <span class="texts whitespace-nowrap">General Setting</span>
    </a>
@endsection
@section('content')

<section class="min-h-screen p-6 bg-gray-100">

    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">General Settings</h1>
        <p class="text-gray-600 mt-1">Manage your website's general information, logos, and social media links.</p>
    </div>

    <div class="bg-white shadow-md rounded-xl p-8">

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ isset($resources) ? route('admin.general-setting.update', $resources->id) : route('admin.general-setting.store') }}"
            method="POST" enctype="multipart/form-data"
            class="space-y-6">

            @csrf
            @if (isset($resources))
                @method('PUT')
            @endif

            <!-- About Small Text -->
            <div>
                <label class="block mb-2 font-medium text-gray-700">About Small Text</label>
                <textarea name="about_small_text" rows="4"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                    placeholder="Write a brief description about your organization">{{ old('about_small_text', $resources->about_small_text ?? '') }}</textarea>
            </div>

            <!-- Logos -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Header Logo</label>
                    <input type="file" name="header_logo"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none">
                    @if (isset($resources->header_logo))
                        <img src="{{ asset('storage/' . $resources->header_logo) }}"
                            class="w-32 h-20 object-contain mt-3 rounded shadow-sm" alt="Header Logo">
                    @endif
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">Footer Logo</label>
                    <input type="file" name="footer_logo"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none">
                    @if (isset($resources->footer_logo))
                        <img src="{{ asset('storage/' . $resources->footer_logo) }}"
                            class="w-32 h-20 object-contain mt-3 rounded shadow-sm" alt="Footer Logo">
                    @endif
                </div>
            </div>

            <!-- Social Media Links -->
            <div>
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Social Media Links</h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <input type="url" name="facebook" placeholder="Facebook URL"
                        value="{{ old('facebook', $resources->facebook ?? '') }}"
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">

                    <input type="url" name="twitter" placeholder="Twitter / X URL"
                        value="{{ old('twitter', $resources->twitter ?? '') }}"
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">

                    <input type="url" name="linkedin" placeholder="LinkedIn URL"
                        value="{{ old('linkedin', $resources->linkedin ?? '') }}"
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">

                    <input type="url" name="instagram" placeholder="Instagram URL"
                        value="{{ old('instagram', $resources->instagram ?? '') }}"
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">

                    <input type="url" name="youtube" placeholder="YouTube URL"
                        value="{{ old('youtube', $resources->youtube ?? '') }}"
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>
            </div>

            <!-- Active Checkbox -->
            <div class="flex items-center gap-3 mt-4">
                <input type="checkbox" name="is_active" value="1"
                    {{ old('is_active', $resources->is_active ?? true) ? 'checked' : '' }}
                    class="w-5 h-5 text-emerald-600 rounded border-gray-300 focus:ring-2 focus:ring-emerald-500">
                <label class="font-medium text-gray-700">Active</label>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="px-6 py-2.5 bg-emerald-600 text-white rounded-lg shadow-md hover:bg-emerald-700 transition duration-300">
                    {{ isset($resources) ? 'Update Settings' : 'Save Settings' }}
                </button>
            </div>

        </form>

    </div>

</section>

@endsection