@extends('backend.system.layout.master')

@section('title')
    Fund | Edit User
@endsection

@section('content')

<div class="min-h-screen p-6 bg-gray-100">

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Edit User Role</h1>
        <p class="text-sm text-gray-500">Update the role assigned to this user.</p>
    </div>


    <!-- Card -->
    <div class="max-w-xl bg-white shadow-md rounded-xl">

        <div class="p-6">

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')


                <!-- User Name -->
                <div class="mb-5">

                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        User Name
                    </label>

                    <input 
                        type="text"
                        value="{{ $user->full_name }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none"
                        readonly
                    >

                </div>



                <!-- Role -->
                <div class="mb-6">

                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Select Role
                    </label>

                    <select name="role_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                        @foreach ($roles as $role)

                            <option value="{{ $role->id }}"
                                {{ $user->role_id == $role->id ? 'selected' : '' }}>

                                {{ ucfirst($role->name) }}

                            </option>

                        @endforeach

                    </select>

                </div>



                <!-- Buttons -->
                <div class="flex gap-3">

                    <button type="submit"
                        class="px-6 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">
                        Update Role
                    </button>

                    <a href="{{ route('users.index') }}"
                        class="px-6 py-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection