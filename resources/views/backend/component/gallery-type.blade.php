@section('link')
    <a @if (!request()->routeIs('admin.gallery.index')) href="{{ route('admin.gallery.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.gallery.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">Gallery</span>
    </a>

@endsection