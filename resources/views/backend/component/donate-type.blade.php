@section('link')
    <a @if (!request()->routeIs('admin.donation.index')) href="{{ route('admin.donation.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.donation.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">Donation</span>
    </a>

@endsection