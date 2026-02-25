@extends('backend.system.layout.master')
@section('title')
    Fund | Gallery
@endsection
@include('backend.component.gallery-type')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
    <section class="min-h-screen p-2 md:p-2 bg-slate-100">
        <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Gallery</h2>
                    <p class="mt-1 text-sm text-gray-500">Manage your media collection</p>
                </div>
               
                <div class="flex items-center gap-2 ml-auto">
                    <button id="selectAllBtn"
                        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-slate-600 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
                        <i class="fas fa-check-square"></i> Select All
                    </button>
                    <button id="deleteBtn" disabled
                        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-lg transition-colors disabled:bg-slate-300 disabled:cursor-not-allowed">
                        <i class="fas fa-trash"></i> Delete (<span id="selectedCount">0</span>)
                    </button>

                     <a href="{{ route('admin.gallery.create') }}"
                    class="block w-full md:w-auto text-center px-4 py-1.5 bg-gradient-to-b from-emerald-500 to-emerald-600 hover:from-emerald-800 hover:to-emerald-600 text-white rounded-lg transition-all duration-300 font-medium shadow-md">
                    <i class="mr-2 fas fa-plus"></i>Upload Image
                </a>
                </div>
            </div>
        </div>

        <!-- Bulk bar -->
        <div id="bulkBar" class="hidden items-center gap-3 bg-blue-50 border border-blue-200 rounded-xl px-5 py-3 mb-4">
            <i class="fas fa-info-circle text-blue-500"></i>
            <span class="text-sm text-blue-800 font-medium"><span id="bulkCount">0</span> item(s) selected</span>
            <button id="clearSelectionBtn"
                class="text-xs px-3 py-1.5 border border-slate-200 rounded-lg bg-white hover:bg-slate-50 text-slate-600 transition-colors">
                Clear
            </button>
        </div>

        <!-- Gallery Grid -->
        @if ($resources->isEmpty())
            <div class="bg-white rounded-xl shadow-sm flex flex-col items-center justify-center py-24 text-center">
                <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-image text-3xl text-slate-300"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-700 mb-1">No images yet</h3>
                <p class="text-sm text-slate-400 mb-6">Upload your first image to get started</p>
                <a href="{{ route('admin.gallery.create') }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                    <i class="fas fa-plus"></i> Upload Image
                </a>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4" id="galleryGrid">
                @foreach ($resources as $image)
                    <div class="gallery-item group relative bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 cursor-pointer"
                        data-id="{{ $image->id }}" data-title="{{ strtolower($image->title) }}"
                        data-category="{{ $image->category_id }}" data-status="{{ $image->status }}">

                        <!-- Check badge (shown when selected) -->
                        <div
                            class="check-badge hidden absolute top-2 left-2 z-10 w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>

                        <!-- Image -->
                        <div class="overflow-hidden">
                            <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title }}"
                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>

                        <!-- Hover overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-3 gap-2">
                            <a href="{{ route('admin.gallery.edit', $image->id) }}" onclick="event.stopPropagation()"
                                class="w-8 h-8 bg-white/20 hover:bg-white/40 rounded-lg flex items-center justify-center text-white transition-colors"
                                title="Edit">
                                <i class="fas fa-edit text-sm"></i>
                            </a>
                            <form action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST"
                                onclick="event.stopPropagation()" onsubmit="return confirm('Delete this image?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="w-8 h-8 bg-red-500/80 hover:bg-red-500 rounded-lg flex items-center justify-center text-white transition-colors"
                                    title="Delete">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Card info -->
                        <div class="p-3">
                            <p class="text-sm font-medium text-slate-800 truncate">{{ $image->title }}</p>
                            <div class="flex items-center justify-between mt-1.5">
                                <span class="text-xs text-slate-400">{{ $image->galleryCategory?->name ?? '—' }}</span>
                                <span
                                    class="text-xs font-medium px-2 py-0.5 rounded-full
                                {{ $image->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-600' }}">
                                    {{ $image->status ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (method_exists($resources, 'links'))
                <div class="mt-8">{{ $resources->links() }}</div>
            @endif
        @endif

    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(function() {

            function updateUI() {
                const checked = $('.gallery-item.selected').length;
                const total = $('.gallery-item:visible').length;

                $('#selectedCount').text(checked);
                $('#bulkCount').text(checked);
                $('#deleteBtn').prop('disabled', checked === 0);

                if (checked > 0) {
                    $('#bulkBar').removeClass('hidden').addClass('flex');
                } else {
                    $('#bulkBar').addClass('hidden').removeClass('flex');
                }

                const allSelected = checked > 0 && checked === total;
                $('#selectAllBtn').html(
                    allSelected ?
                    '<i class="fas fa-times-square"></i> Deselect All' :
                    '<i class="fas fa-check-square"></i> Select All'
                );
            }

            // Click card to select/deselect
            $(document).on('click', '.gallery-item', function(e) {
                if ($(e.target).closest('a, form, button').length) return;
                const selected = $(this).toggleClass('selected').hasClass('selected');
                $(this).find('.check-badge').toggleClass('hidden', !selected);
                $(this).toggleClass('ring-2 ring-blue-500 ring-offset-2', selected);
                updateUI();
            });

            // Select All / Deselect All
            $('#selectAllBtn').on('click', function() {
                const visible = $('.gallery-item:visible');
                const allSelected = visible.length === $('.gallery-item.selected:visible').length;

                visible.each(function() {
                    if (allSelected) {
                        $(this).removeClass('selected ring-2 ring-blue-500 ring-offset-2');
                        $(this).find('.check-badge').addClass('hidden');
                    } else {
                        $(this).addClass('selected ring-2 ring-blue-500 ring-offset-2');
                        $(this).find('.check-badge').removeClass('hidden');
                    }
                });
                updateUI();
            });

            // Clear selection
            $('#clearSelectionBtn').on('click', function() {
                $('.gallery-item').removeClass('selected ring-2 ring-blue-500 ring-offset-2');
                $('.check-badge').addClass('hidden');
                updateUI();
            });

            // Bulk Delete
            $('#deleteBtn').on('click', function() {
                const ids = $('.gallery-item.selected').map(function() {
                    return $(this).data('id');
                }).get();

                if (!ids.length) return;
                if (!confirm(`Permanently delete ${ids.length} image(s)? This cannot be undone.`)) return;

                const url = '{{ route('admin.gallery.destroy', '__ids__') }}'.replace('__ids__', ids.join(
                    ','));

                $.ajax({
                    url,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        ids.forEach(function(id) {
                            $(`.gallery-item[data-id="${id}"]`).fadeOut(300,
                        function() {
                                $(this).remove();
                                updateUI();
                            });
                        });
                    },
                    error: function() {
                        alert('Something went wrong. Please try again.');
                    }
                });
            });

            // Filters
            function applyFilters() {
                const search = $('#searchInput').val().toLowerCase();
                const category = $('#categoryFilter').val();
                const status = $('#statusFilter').val();

                $('.gallery-item').each(function() {
                    const matchSearch = !search || ($(this).data('title') || '').includes(search);
                    const matchCategory = !category || String($(this).data('category')) === category;
                    const matchStatus = !status || String($(this).data('status')) === status;
                    $(this).toggle(matchSearch && matchCategory && matchStatus);
                });
            }

            $('#searchInput').on('input', applyFilters);
            $('#categoryFilter, #statusFilter').on('change', applyFilters);
        });
    </script>
@endsection
