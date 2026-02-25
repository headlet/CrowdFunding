@section('link')
    <a @if (!request()->routeIs('admin.team.index')) href="{{ route('admin.team.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.team.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">Teams</span>
    </a>

@endsection