@extends('backend.system.layout.master')
@section('title')
    Fund | Role_permission
@endsection
@include('backend.component.permission-type')
@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-xl p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Assign Role Permissions
        </h2>

        <form method="POST" action="{{ route('admin.role-permission.store') }}">
            @csrf

            <!-- Role Select -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Select Role
                </label>

                <select name="role_id"
                        required
                        class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    <option value="">Choose Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Global Select All -->
            <div class="mb-4">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" id="selectAll"
                           class="w-4 h-4 text-emerald-600 border-gray-300 rounded">
                    <span class="text-sm font-medium text-gray-700">
                        Select All Permissions
                    </span>
                </label>
            </div>

            <!-- Permission Groups -->
            <div class="space-y-6">

                @foreach($permissions as $group => $groupPermissions)
                    <div class="border border-gray-200 rounded-lg p-5 bg-gray-50">

                        <!-- Group Header -->
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800 capitalize">
                                {{ str_replace('-', ' ', $group) }}
                            </h3>

                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox"
                                       class="group-toggle w-4 h-4 text-emerald-600 border-gray-300 rounded"
                                       data-group="{{ $group }}">
                                <span class="text-sm text-gray-600">
                                    Select All
                                </span>
                            </label>
                        </div>

                        <!-- Permission Checkboxes -->
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">

                            @foreach($groupPermissions as $permission)
                                <label class="flex items-center gap-2 bg-white px-3 py-2 rounded-md border border-gray-200 hover:bg-emerald-50 cursor-pointer transition">
                                    
                                    <input type="checkbox"
                                           name="permissions[]"
                                           value="{{ $permission->id }}"
                                           class="permission-checkbox w-4 h-4 text-emerald-600 border-gray-300 rounded"
                                           data-group="{{ $group }}">

                                    <span class="text-sm text-gray-700">
                                        {{ ucwords(str_replace('.', ' ', $permission->name)) }}
                                    </span>
                                </label>
                            @endforeach

                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Submit Button -->
            <div class="mt-8">
                <button type="submit"
                        class="px-6 py-2.5 bg-gradient-to-r from-emerald-500 to-emerald-700 hover:from-emerald-600 hover:to-emerald-800 text-white font-medium rounded-lg shadow-md transition">
                    Save Permissions
                </button>
            </div>

        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const selectAll = document.getElementById("selectAll");
    const groupToggles = document.querySelectorAll(".group-toggle");
    const checkboxes = document.querySelectorAll(".permission-checkbox");

    // Global Select All
    selectAll.addEventListener("change", function () {
        checkboxes.forEach(cb => cb.checked = selectAll.checked);
        groupToggles.forEach(gt => gt.checked = selectAll.checked);
    });

    // Group Select
    groupToggles.forEach(toggle => {
        toggle.addEventListener("change", function () {
            const group = toggle.dataset.group;
            document.querySelectorAll(`.permission-checkbox[data-group='${group}']`)
                .forEach(cb => cb.checked = toggle.checked);
        });
    });

});
</script>
@endsection