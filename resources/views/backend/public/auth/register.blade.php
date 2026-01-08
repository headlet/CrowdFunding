@extends('backend.public.layouts.master')
@section('title')
    Register
@endsection

@section('content')
    <section class="bg-[#f6f8f7] text-gray-800">

        <!-- HERO -->
        <section class="relative bg-gradient-to-br from-[#0a2f2a] via-[#02221e] to-[#000000] py-32">
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_top,white,transparent_60%)]"></div>
            <div class="relative px-4 text-center text-white">
                <h1 class="text-4xl font-extrabold tracking-tight sm:text-6xl">Register</h1>
                <p class="mt-4 text-base text-gray-300">Home → Register</p>
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
                        <i class="text-xl fa-solid fa-user-plus"></i>
                    </div>
                    <h2 class="mt-4 text-3xl font-bold">Create Account</h2>
                    <p class="mt-1 text-base text-gray-500">Join our mission & make impact</p>
                </div>

                <!-- FORM -->
                <form action="{{ route('register_create') }}" method="POST" class="space-y-5">
                    @csrf
                    <input type="text" name="full_name" placeholder="Full Name"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0b3d36] text-lg">
                    <input type="email" name="email" placeholder="Email Address"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0b3d36] text-lg">

                    <button type="submit"
                        class="w-full mt-4 bg-gradient-to-br from-[#0a2f2a] via-[#0b3d36] to-[#06201d] p-3 text-white rounded-xl text-lg font-semibold hover:opacity-90 transition">
                        Create Account
                    </button>
                </form>

                <!-- FOOTER -->
                <p class="mt-6 text-base text-center text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-semibold text-[#0b3d36] hover:underline">Login</a>
                </p>

            </div>
        </section>

    </section>
@endsection
