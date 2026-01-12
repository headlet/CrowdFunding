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
                        <h1 class="mb-2 text-3xl font-bold text-blue-900">Blog: List of Articles</h1>
                        <p class="mb-6 text-sm text-gray-600">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                            accusantium doloremque</p>
                    </div>

                    <a href="{{ route('admin.blog.create') }}"
                        class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600">
                        Add Article
                    </a>
                </div>

                <!-- Search and Filters -->
                <div class="flex flex-wrap items-center gap-3 p-3 bg-white border border-gray-200 rounded-lg">

                    <!-- Search -->
                    <div class="relative flex-1 min-w-[220px]">
                        <svg class="absolute w-4 h-4 text-gray-400 -translate-y-1/2 left-3 top-1/2" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 3.5a7.5 7.5 0 0013.15 13.15z" />
                        </svg>
                        <input type="text" placeholder="Search..."
                            class="w-auto pr-3 text-sm border border-gray-300 rounded-md h-9 pl-9 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Filters -->
                    <div class="flex flex-wrap gap-2">
                        <select
                            class="px-3 text-sm text-gray-600 border border-gray-300 rounded-md h-9 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <option>Date</option>
                            <option>Newest</option>
                            <option>Oldest</option>
                        </select>

                        <select name="user_id"
                            class="px-3 text-sm text-gray-600 border border-gray-300 rounded-md h-9 focus:outline-none focus:ring-1 focus:ring-blue-500">

                            <option value="">Author</option>
                            <option value="">All</option>

                            @foreach ($resources['user'] as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->full_name }}
                                </option>
                            @endforeach
                        </select>


                        <!-- Category Select -->
                        <select name="category_id"
                            class="px-3 text-sm text-gray-600 border border-gray-300 rounded-md h-9 focus:outline-none focus:ring-1 focus:ring-blue-500">

                            <option value="">Type</option>
                            <option value="">All</option>

                            @foreach ($resources['category'] as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Advanced -->
                        <button
                            class="px-3 text-sm text-gray-600 border border-gray-300 rounded-md h-9 hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            Advanced
                        </button>
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
                                Delete Selected
                            </button>

                            <button class="px-4 py-2 text-sm bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                Select All
                            </button>

                        </div>
                    </div>

                    <!-- Articles List -->
                    <div class="overflow-hidden bg-white shadow-sm rounded-xl" id="articlesList">
                        @forelse ($resources['blog'] as $blog)
                            <div class="flex gap-6 p-6 transition border-b border-gray-100 hover:bg-gray-50 article-item">
                                <input type="checkbox" class="w-5 h-5 mt-1 cursor-pointer article-checkbox"">
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=300&h=200&fit=crop"
                                    alt="Article" class="flex-shrink-0 object-cover w-40 rounded-lg h-28">
                                <div class="flex-1">
                                    <div class="mb-1 text-sm font-medium text-blue-600">{{ $blog->title }}</div>
                                    <div class="mb-2 font-semibold text-gray-900">{{ $blog->category->name }}</div>
                                    <p class="text-sm leading-relaxed text-gray-500">{{ $blog->content }}</p>
                                </div>
                                <div class="text-sm text-gray-400">{{ $blog->created_at }}</div>
                            </div>
                        @empty
                            <div class="flex flex-col items-center justify-center p-12 text-center">
                                <svg class="w-16 h-16 mb-4 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                                </svg>

                                <h3 class="mb-1 text-lg font-semibold text-gray-700">
                                    No Blogs Found
                                </h3>

                                <p class="mb-4 text-sm text-gray-500">
                                    There are no blog posts available right now.
                                    Please check back later.
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
        @endsection
