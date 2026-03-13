@section('link')
    <a @if (!request()->routeIs('admin.slider.index')) href="{{ route('admin.slider.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.slider.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">Slider</span>
    </a>

    <a @if (!request()->routeIs('admin.about-charity.index')) href="{{ route('admin.about-charity.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.about-charity.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">About Charity</span>
    </a>

    <a @if (!request()->routeIs('admin.success-story.index')) href="{{ route('admin.success-story.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.success-story.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">Success Story</span>
    </a>

    <a @if (!request()->routeIs('admin.about.index')) href="{{ route('admin.about.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.about.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">About us</span>
    </a>

    <a @if (!request()->routeIs('admin.contact.index')) href="{{ route('admin.contact.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.contact.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">Contact</span>
    </a>

    
@endsection
