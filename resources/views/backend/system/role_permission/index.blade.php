@extends('backend.system.layout.master')

@section('title', 'Fund | Role & Permission')

@include('backend.component.permission-type')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">

    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Roles & Permissions</h2>

        <!-- Add Role Button -->
        <a href="{{ route('admin.role-permission.create') }}"
           class="block md:inline-block w-full md:w-auto text-center px-6 py-2.5 bg-gradient-to-b from-emerald-500 to-emerald-700 hover:from-emerald-800 hover:to-emerald-600 text-white rounded-lg font-medium shadow-md transition-all duration-300">
           Add Role & Permission
        </a>
    </div>

    <!-- Roles Table -->
    <div class="bg-white rounded-xl shadow-md overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700">
            <!-- Table Header -->
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-4 font-semibold text-gray-600 uppercase tracking-wider">Role Name</th>
                    <th class="px-6 py-4 font-semibold text-gray-600 uppercase tracking-wider">Permissions</th>
                    <th class="px-6 py-4 text-right font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="divide-y divide-gray-200">
                @forelse($resources as $role)
                    <tr class="hover:bg-gray-50 transition">

                        <!-- Role Name -->
                        <td class="px-6 py-5 font-medium text-gray-800">{{ $role->name }}</td>

                        <!-- Permissions -->
                        <td class="px-6 py-5">
                            <div class="flex flex-wrap gap-2">
                                @forelse($role->permissions as $permission)
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                                        {{ $loop->index % 5 == 0 ? 'bg-indigo-100 text-indigo-600' : '' }}
                                        {{ $loop->index % 5 == 1 ? 'bg-green-100 text-green-600' : '' }}
                                        {{ $loop->index % 5 == 2 ? 'bg-blue-100 text-blue-600' : '' }}
                                        {{ $loop->index % 5 == 3 ? 'bg-yellow-100 text-yellow-600' : '' }}
                                        {{ $loop->index % 5 == 4 ? 'bg-red-100 text-red-600' : '' }}">
                                        {{ ucwords(str_replace('.', ' ', $permission->name)) }}
                                    </span>
                                @empty
                                    <span class="text-gray-400 text-sm">No specific permissions (Full access if Super Admin)</span>
                                @endforelse
                            </div>
                        </td>

                        <!-- Action Buttons -->
                        <td class="px-6 py-5 text-right">
                            <div class="flex justify-end gap-3">
                                <!-- Edit -->
                                <a href="{{ route('admin.role-permission.edit', $role->id) }}"
                                   class="text-blue-600 hover:text-blue-800 transition">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </a>

                                <!-- Optional Delete (commented out) -->
                                {{-- 
                                <form action="{{ route('admin.role-permission.destroy', $role->id) }}" method="POST" onsubmit="return confirmDelete(event)" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                        <i class="fa-solid fa-trash text-lg"></i>
                                    </button>
                                </form>
                                --}}
                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-5 text-center text-gray-400">
                            No roles found. <a href="{{ route('admin.role-permission.create') }}" class="text-emerald-600 underline">Add a new role</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<!-- Optional JS for Delete Confirmation -->
<script>
    function confirmDelete(event) {
        event.preventDefault();
        if(confirm('Are you sure you want to delete this role? This action cannot be undone.')) {
            event.target.submit();
        }
    }
</script>
@endsection