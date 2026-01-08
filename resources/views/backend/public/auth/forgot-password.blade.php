@extends('backend.public.layouts.master')

@section('title')
    Forgot Password
@endsection

@section('content')
    <section class="bg-[#f6f8f7] text-gray-800">

        <!-- HERO -->
        <section class="relative bg-gradient-to-br from-[#0a2f2a] via-[#02221e] to-[#000000] py-32">
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_top,white,transparent_60%)]"></div>
            <div class="relative px-4 text-center text-white">
                <h1 class="text-4xl font-extrabold tracking-tight sm:text-6xl">Forgot Password</h1>
                <p class="mt-4 text-base text-gray-300">Home → Forgot Password</p>
            </div>
        </section>

        <!-- CARD -->
        <section class="px-4 pb-24 -mt-20">
            <div
                class="max-w-md p-8 mx-auto border shadow-2xl backdrop-blur-xl bg-white/90 rounded-3xl sm:p-10 border-white/40">

                <!-- TITLE -->
                <div class="mb-8 text-center">
                    <div
                        class="w-14 h-14 mx-auto flex items-center justify-center rounded-full bg-[#0b3d36] text-white shadow-lg">
                        <i class="text-xl fa-solid fa-lock"></i>
                    </div>
                    <h2 class="mt-4 text-3xl font-bold">Reset Your Password</h2>
                    <p class="mt-1 text-base text-gray-500">
                        Enter your email and we’ll send you a reset link
                    </p>
                </div>

                <!-- STATUS MESSAGE -->
                @if (session('status'))
                    <div class="px-4 py-3 mb-4 text-sm text-green-700 bg-green-100 border border-green-200 rounded-xl">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- FORM -->
                <form method="POST" action="" class="space-y-5">
                    @csrf

                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0b3d36] text-lg">

                    <button type="submit"
                        class="w-full mt-4 bg-gradient-to-br from-[#0a2f2a] via-[#0b3d36] to-[#06201d] p-3 text-white rounded-xl text-lg font-semibold hover:opacity-90 transition">
                        Send Password Reset Link
                    </button>
                </form>

                <!-- FOOTER -->
                <p class="mt-6 text-base text-center text-gray-600">
                    Remember your password?
                    <a href="{{ route('login') }}" class="font-semibold text-[#0b3d36] hover:underline">
                        Back to Login
                    </a>
                </p>

            </div>
        </section>

    </section>
@endsection
