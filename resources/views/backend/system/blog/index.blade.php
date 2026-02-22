@extends('backend.system.layout.master')
@section('title')
    Blogs
@endsection
@section('content')
    <!-- Blog Articles Page -->
    <div id="blogPage" class="page">
        <!-- Header -->
        <div class="bg-white border-b border-gray-200">
            <div class="relative px-8 py-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="mb-3 text-3xl font-bold text-green-500">Blog: List of Articles</h1>
                    </div>
                    <div class="flex justify-evenly items-center gap-x-2">
                        <a href="{{ route('admin.blog.create') }}"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                            Create New Blog
                        </a>

                        <a href="{{ route('admin.blog-category.index') }}"
                            class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600">
                            Article Category
                        </a>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="px-8 py-8">
                    <!-- List Header -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-4">
                            <h2 class="text-lg text-gray-600">List of Blog Articles</h2>
                        </div>

                        <div class="flex items-center gap-4">

                            <button id="deleteBtn"
                                class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 disabled:bg-gray-300 disabled:cursor-not-allowed"
                                disabled>
                                Delete Selected (<span id="selectedCount">0</span>)
                            </button>

                            <button id="selectAllBtn"
                                class="px-4 py-2 text-sm bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                Select All
                            </button>

                        </div>
                    </div>

                    <!-- Articles List -->
                    <div class="overflow-hidden bg-white shadow-sm rounded-xl" id="articlesList">
                        @forelse ($resources['blog'] as $blog)
                            <div class="flex gap-6 p-6 transition border-b border-gray-100 hover:bg-gray-50 article-item">
                                <input type="checkbox" class="w-5 h-5 mt-1 cursor-pointer article-checkbox"
                                    value="{{ $blog->id }}">
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=300&h=200&fit=crop"
                                    alt="Article" class="flex-shrink-0 object-cover w-40 rounded-lg h-28">
                                <div class="flex-1">
                                    <div class="mb-1 text-sm font-medium text-blue-600">{{ $blog->title }}</div>
                                    <div class="mb-2 font-semibold text-gray-900">
                                        {{ $blog->blogCategory?->name ?? 'No Category' }}
                                    </div>
                                    <p class="text-sm leading-relaxed text-gray-500">{{ $blog->content }}</p>
                                </div>
                                <div class="flex flex-col gap-6 items-center">
                                    <div class="text-sm text-gray-400">
                                        {{ $blog->created_at }}
                                    </div>

                                    <a href="{{route('admin.blog.edit', $blog->id)}}"><i class="fas fa-edit pt-2 text-center w-12 h-12 bg-green-300 rounded-full text-2xl hover:bg-blue-400"></i></a>
                                </div>
                            </div>
                        @empty
                            <div class="flex flex-col items-center justify-center p-12 text-center">
                                <svg class="w-16 h-16 mb-4 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                                </svg>
                                <h3 class="mb-1 text-lg font-semibold text-gray-700">No Blogs Found</h3>
                                <p class="mb-4 text-sm text-gray-500">
                                    There are no blog posts available right now. Please check back later.
                                </p>
                                <a href="{{ route('admin.blog.create') }}"
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                    Create New Blog
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(function() {

            // Update delete button state based on checked checkboxes
            function updateDeleteBtn() {
                const checkedCount = $('.article-checkbox:checked').length;
                $('#selectedCount').text(checkedCount);

                if (checkedCount > 0) {
                    $('#deleteBtn').prop('disabled', false);
                } else {
                    $('#deleteBtn').prop('disabled', true);
                }

                // Update Select All button label
                const totalCount = $('.article-checkbox').length;
                if (checkedCount === totalCount && totalCount > 0) {
                    $('#selectAllBtn').text('Deselect All');
                } else {
                    $('#selectAllBtn').text('Select All');
                }
            }

            // Individual checkbox change
            $(document).on('change', '.article-checkbox', function() {
                updateDeleteBtn();
            });

            // Select All / Deselect All toggle
            $('#selectAllBtn').on('click', function() {
                const totalCount = $('.article-checkbox').length;
                const checkedCount = $('.article-checkbox:checked').length;
                const shouldSelectAll = checkedCount < totalCount;

                $('.article-checkbox').prop('checked', shouldSelectAll);
                updateDeleteBtn();
            });

            // Delete Selected
            $('#deleteBtn').on('click', function() {
                const selectedIds = $('.article-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();

                if (selectedIds.length === 0) return;

                if (!confirm(
                        `Are you sure you want to delete ${selectedIds.length} blog post(s)? This cannot be undone.`
                    )) {
                    return;
                }

                // Join IDs as comma-separated and reuse the default destroy route
                const ids = selectedIds.join(',');
                const url = '{{ route('admin.blog.destroy', '__ids__') }}'.replace('__ids__', ids);

                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        // Remove deleted rows from DOM
                        selectedIds.forEach(function(id) {
                            $(`.article-checkbox[value="${id}"]`).closest(
                                '.article-item').fadeOut(300, function() {
                                $(this).remove();
                                updateDeleteBtn();
                            });
                        });
                    },
                    error: function(xhr) {
                        alert('Something went wrong. Please try again.');
                    }
                });
            });

        });
    </script>
@endsection
