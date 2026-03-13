@extends('backend.system.layout.master')
@section('title')
    Fund | User
@endsection
@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    <!-- Top Section -->
    <div class="flex justify-between mb-6">

        <input type="text"
            placeholder="Search"
            class="px-4 py-2 border rounded-lg w-64">

        <a href="{{ route('users.create') }}"
            class="px-4 py-2 text-white bg-indigo-500 rounded-lg">
            Add User
        </a>

    </div>

    <!-- Table -->
    <div class="overflow-hidden bg-white rounded-lg shadow">

        <table class="w-full text-left">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4">Full Name</th>
                    <th class="p-4">Role</th>
                    <th class="p-4">Email Verified</th>
                    <th class="p-4">Is Active</th>
                    <th class="p-4">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($users as $user)

                <tr class="border-t">

                    <!-- User -->
                    <td class="p-4 flex items-center gap-3">

                        <img src="{{ asset('storage/'.$user->image) }}"
                            class="w-10 h-10 rounded-full">

                        <div>
                            <p class="font-semibold">{{ $user->full_name }}</p>
                            <p class="text-sm text-gray-500">{{ $user->email }}</p>
                        </div>

                    </td>

                    <!-- Role -->
                    <td class="p-4">

                        <span class="px-3 py-1 text-green-700 bg-green-100 rounded-full text-sm">
                            {{ $user->role->name ?? 'No Role' }}
                        </span>

                    </td>

                    <!-- Email Verified -->
                    <td class="p-4">

                        <input type="checkbox"
                            {{ $user->email_verified_at ? 'checked' : '' }}
                            class="toggle">

                    </td>

                    <!-- Active -->
                    <td class="p-4">

                        <input type="checkbox"
                            {{ $user->status ? 'checked' : '' }}
                            class="toggle">

                    </td>

                    <!-- Action -->
                    <td class="p-4 flex gap-3">

                        <a href="{{ route('users.edit',$user->id) }}"
                            class="text-indigo-500 text-lg">
                            ✏️
                        </a>

                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-500 text-lg">
                                🗑
                            </button>
                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection