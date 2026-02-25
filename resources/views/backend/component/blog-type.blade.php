@section('link')
    <a @if (!request()->routeIs('admin.blog.index')) href="{{ route('admin.blog.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.blog.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">Blog</span>
    </a>

    <a @if (!request()->routeIs('admin.blog-category.index')) href="{{ route('admin.blog-category.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.blog-category.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">Blog Category</span>
    </a>
@endsection