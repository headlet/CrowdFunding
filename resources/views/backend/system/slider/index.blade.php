@extends('backend.system.layout.master')

@section('title', 'Fund | Sliders')
@include('backend.component.front-type')
@section('content')
<div class="p-6 bg-gray-100 min-h-screen">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Sliders</h2>
        <a href="{{ route('admin.slider.create') }}"
           class="px-6 py-2.5 bg-emerald-600 text-white rounded-lg shadow-md hover:bg-emerald-700 transition duration-300 font-medium text-center">
           Add Slider
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-md overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 font-semibold uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 font-semibold uppercase tracking-wider">Title 1</th>
                    <th class="px-6 py-3 font-semibold uppercase tracking-wider">Title 2</th>
                    <th class="px-6 py-3 font-semibold uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($resources as $slider)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $slider->image) }}" class="w-16 h-16 object-cover rounded-full">
                        </td>
                        <td class="px-6 py-4">{{ $slider->title1 }}</td>
                        <td class="px-6 py-4">{{ $slider->title2 }}</td>
                        <td class="px-6 py-4 text-right flex justify-end gap-2">
                            <a href="{{ route('admin.slider.edit', $slider->id) }}" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this slider?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-400">
                            No sliders found. <a href="{{ route('admin.slider.create') }}" class="text-emerald-600 underline">Add a new slider</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection