@extends('backend.system.layout.master')

@section('title', 'Fund | Add Slider')
@include('backend.component.front-type')
@section('content')
<div class="p-6 bg-gray-100 min-h-screen">

    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold mb-6">Add New Slider</h2>

        <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block mb-2 font-medium">Subtitle</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle') }}" 
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-200">
                </div>

                <div>
                    <label class="block mb-2 font-medium">Title 1 *</label>
                    <input type="text" name="title1" value="{{ old('title1') }}" 
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-200" required>
                </div>

                <div>
                    <label class="block mb-2 font-medium">Title 2 *</label>
                    <input type="text" name="title2" value="{{ old('title2') }}" 
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-200" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-2 font-medium">Description</label>
                    <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-200">{{ old('description') }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-2 font-medium">Image</label>
                    <input type="file" name="image" class="w-full border p-2 rounded-lg">
                </div>

                <div class="md:col-span-2 flex items-center gap-3">
                    <label class="font-medium">Active</label>
                    <input type="checkbox" name="is_active" value="1" checked>
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-2 font-medium">Order</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" 
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-200">
                </div>

            </div>

            <div class="mt-6">
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                    Add Slider
                </button>
            </div>
        </form>
    </div>
</div>
@endsection