@extends('backend.system.layout.master')

@section('title', 'Fund | Contact')
@include('backend.component.front-type')
@section('content')
<section class="min-h-screen p-6 bg-gray-100">

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Contact Information</h2>
        <p class="text-gray-600 mt-1">Manage the organization's contact details here.</p>
    </div>

    <div class="p-6 bg-white rounded-xl shadow-md">

        <form
            action="{{ isset($resources) ? route('admin.contact.update', $resources->id) : route('admin.contact.store') }}"
            method="POST">
            @csrf
            @if(isset($resources))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Address -->
                <div class="md:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Address</label>
                    <textarea name="address" rows="4" 
                              placeholder="Enter full address"
                              class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('address', $resources->address ?? '') }}</textarea>
                </div>

                <!-- Phone -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" 
                           value="{{ old('phone', $resources->phone ?? '') }}" 
                           placeholder="+977-XXXXXXX"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <!-- Email -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" 
                           value="{{ old('email', $resources->email ?? '') }}" 
                           placeholder="example@email.com"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <!-- Google Map -->
                <div class="md:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Google Map URL</label>
                    <input type="url" name="map" 
                           value="{{ old('map', $resources->map ?? '') }}" 
                           placeholder="https://www.google.com/maps/embed?..."
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

            </div>

            <!-- Map Preview -->
            @if(isset($resources->map) && !empty($resources->map))
                <div class="mt-6">
                    <label class="block mb-2 font-medium text-gray-700">Map Preview</label>
                    <iframe src="{{ $resources->map }}" width="100%" height="350" 
                            class="rounded-lg border-0 shadow-sm" allowfullscreen="" loading="lazy"></iframe>
                </div>
            @endif

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" 
                        class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 focus:ring-2 focus:ring-emerald-300">
                    {{ isset($resources) ? 'Update Contact' : 'Save Contact' }}
                </button>
            </div>

        </form>

    </div>
</section>
@endsection