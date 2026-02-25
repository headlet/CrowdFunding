@section('link')
    <a @if (!request()->routeIs('admin.campaigns.index')) href="{{ route('admin.campaigns.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.campaigns.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">Campaign</span>
    </a>

    <a @if (!request()->routeIs('admin.campaign-category.index')) href="{{ route('admin.campaign-category.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.campaign-category.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">Campaign Category</span>
    </a>
@endsection