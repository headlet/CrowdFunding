@extends('backend.public.layouts.master')

@section('title')
Reset Password
@endsection

@section('content')

<section class="bg-[#f6f8f7] text-gray-800">

    <!-- HERO -->
    <section class="relative bg-gradient-to-br from-[#0a2f2a] via-[#02221e] to-[#000000] py-32">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_top,white,transparent_60%)]"></div>
        <div class="relative text-center text-white px-4">
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight">Reset Password</h1>
            <p class="mt-4 text-base text-gray-300">Home → Reset Password</p>
        </div>
    </section>

    <!-- CARD -->
    <section class="-mt-20 pb-24 px-4">
        <div
            class="max-w-md mx-auto backdrop-blur-xl bg-white/90 rounded-3xl shadow-2xl p-8 sm:p-10 border border-white/40">

            <!-- TITLE -->
            <div class="text-center mb-8">
                <div
                    class="w-14 h-14 mx-auto flex items-center justify-center rounded-full bg-[#0b3d36] text-white shadow-lg">
                    <i class="fa-solid fa-key text-xl"></i>
                </div>
                <h2 class="mt-4 text-3xl font-bold">Create New Password</h2>
                <p class="text-base text-gray-500 mt-1">
                    Please enter your new password below
                </p>
            </div>

            <!-- FORM -->
            <form method="POST" action="" class="space-y-5">
                @csrf

                <!-- TOKEN -->
                <input type="hidden" name="token" value="">

                <!-- EMAIL -->
                <input
                    type="email"
                    name="email"
                    value="{{ $email ?? old('email') }}"
                    placeholder="Email Address"
                    required
                    autofocus
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0b3d36] text-lg">

                <!-- PASSWORD -->
                <input
                    type="password"
                    name="password"
                    placeholder="New Password"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0b3d36] text-lg">

                <!-- CONFIRM PASSWORD -->
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirm New Password"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0b3d36] text-lg">

                <!-- SUBMIT -->
                <button
                    type="submit"
                    class="w-full mt-4 bg-gradient-to-br from-[#0a2f2a] via-[#0b3d36] to-[#06201d] p-3 text-white rounded-xl text-lg font-semibold hover:opacity-90 transition">
                    Reset Password
                </button>
            </form>

            <!-- FOOTER -->
            <p class="text-center text-base mt-6 text-gray-600">
                Remember your password?
                <a href="{{ route('login') }}"
                    class="font-semibold text-[#0b3d36] hover:underline">
                    Back to Login
                </a>
            </p>

        </div>
    </section>

</section>

@endsection
