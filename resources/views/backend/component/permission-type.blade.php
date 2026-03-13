@section('link')
    <a @if (!request()->routeIs('admin.role-permission.index')) href="{{ route('admin.role-permission.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.role-permission.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">Role_Permission</span>
    </a>

@endsection