@extends('backend.system.layout.master')
@section('title')
    Fund | Role_permission
@endsection
@include('backend.component.permission-type')
@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-xl p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Edit Permissions for Role: <span class="text-emerald-600">{{ ucfirst($role->name) }}</span>
        </h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.role-permission.update', $role->id) }}">
            @csrf
            @method('PUT')

            <!-- Role Select -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Select Role</label>
                <select name="role_id"
                        required
                        class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @foreach($roles as $r)
                        <option value="{{ $r->id }}" @if($r->id == $role->id) selected @endif>
                            {{ ucfirst($r->name) }}
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
                                <span class="text-sm text-gray-600">Select All</span>
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
                                           data-group="{{ $group }}"
                                           {{ in_array($permission->id, $assignedPermissions) ? 'checked' : '' }}>
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
                    Update Permissions
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

    // Helper: Update group toggle checked state based on permissions inside group
    function updateGroupToggle(group) {
        const groupCheckboxes = document.querySelectorAll(`.permission-checkbox[data-group='${group}']`);
        const groupToggle = document.querySelector(`.group-toggle[data-group='${group}']`);
        if(!groupToggle) return;

        const allChecked = Array.from(groupCheckboxes).every(cb => cb.checked);
        groupToggle.checked = allChecked;
    }

    // Initialize group toggles based on checkbox states
    groupToggles.forEach(toggle => {
        updateGroupToggle(toggle.dataset.group);
    });

    // Initialize global selectAll checkbox
    function updateGlobalSelectAll() {
        const allChecked = Array.from(checkboxes).every(cb => cb.checked);
        selectAll.checked = allChecked;
    }
    updateGlobalSelectAll();

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
            updateGlobalSelectAll();
        });
    });

    // Individual Permission Checkbox change updates group & global selectAll
    checkboxes.forEach(cb => {
        cb.addEventListener("change", function () {
            updateGroupToggle(cb.dataset.group);
            updateGlobalSelectAll();
        });
    });

});
</script>
@endsection