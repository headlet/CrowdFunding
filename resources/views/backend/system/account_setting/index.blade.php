@extends('backend.system.layout.master')

@section('title', 'Account Settings')

@section('link')
    <a @if (!request()->routeIs('admin.account_setting.index')) href="{{ route('admin.account_setting.index') }}" @endif
        class=" py-1  transition-all
    {{ request()->routeIs('admin.account_setting.*')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : 'hover:border-b-2 border-black' }}">
        <span class="texts whitespace-nowrap">Account Setting</span>
    </a>

@endsection

@section('content')

    <div class="max-w-6xl mx-auto">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- PROFILE CARD --}}
            <div class="bg-white border border-gray-100 rounded-2xl shadow-lg p-6 text-center h-fit">

                <img id="avatarPreview"
                    src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('backend/images/default-avatar.png') }}"
                    class="w-32 h-32 rounded-full object-cover border-4 border-emerald-500 shadow mx-auto">

                <h3 class="mt-4 text-lg font-semibold text-gray-800">
                    {{ auth()->user()->full_name }}
                </h3>

                <p class="text-sm text-gray-500">
                    {{ auth()->user()->email }}
                </p>

                <label for="image"
                    class="inline-block mt-4 px-4 py-2 text-sm bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 cursor-pointer transition">
                    Change Photo
                </label>

                <input type="file" id="image" name="image" accept="image/*" class="hidden" form="profileForm">

            </div>


            {{-- PROFILE FORM --}}
            <div class="lg:col-span-2">

                <div class="bg-white border border-gray-100 rounded-2xl shadow-lg p-8">

                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">
                            Account Settings
                        </h2>
                        <p class="text-gray-500 text-sm">
                            Update your personal account information
                        </p>
                    </div>


                    {{-- Alerts --}}
                    @if (session('success'))
                        <div class="mb-6 px-4 py-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form id="profileForm" action="{{ route('admin.account_setting.update', auth()->user()->id) }}"
                        method="POST" enctype="multipart/form-data" class="space-y-6">

                        @csrf
                        @method('PUT')

                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- Full Name --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">
                                    Full Name *
                                </label>

                                <input type="text" name="full_name"
                                    value="{{ old('full_name', auth()->user()->full_name) }}" placeholder="Enter full name"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 outline-none transition">

                                @error('full_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- Email --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">
                                    Email Address *
                                </label>

                                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                    placeholder="Enter email"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 outline-none transition">

                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- Phone --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">
                                    Phone Number
                                </label>

                                <input type="text" name="phone_number"
                                    value="{{ old('phone_number', auth()->user()->phone_number) }}"
                                    placeholder="Enter phone number"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 outline-none transition">

                                @error('phone_number')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- Gender --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">
                                    Gender
                                </label>

                                <select name="gender"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 outline-none transition">

                                    <option value="">Select Gender</option>

                                    @foreach (['male', 'female', 'other'] as $gender)
                                        <option value="{{ $gender }}"
                                            {{ old('gender', auth()->user()->gender) === $gender ? 'selected' : '' }}>
                                            {{ ucfirst($gender) }}
                                        </option>
                                    @endforeach

                                </select>

                                @error('gender')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- Address --}}
                            <div class="md:col-span-2">

                                <label class="block text-sm font-semibold text-gray-600 mb-2">
                                    Address
                                </label>

                                <textarea name="address" rows="3" placeholder="Enter address"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 outline-none transition">{{ old('address', auth()->user()->address) }}</textarea>

                                @error('address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>


                        <div class="pt-4 border-t">

                            <button type="submit"
                                class="px-6 py-2.5 bg-emerald-600 text-white font-semibold rounded-lg shadow hover:bg-emerald-700 transition">

                                Save Changes

                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>


    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = (event) => {
                document.getElementById('avatarPreview').src = event.target.result;
            };

            reader.readAsDataURL(file);
        });
    </script>

@endsection
