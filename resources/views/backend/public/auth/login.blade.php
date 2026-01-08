@extends('backend.public.layouts.master')
@section('title')
    Login
@endsection

@section('content')
    <section class="bg-[#f6f8f7] text-gray-800">

        <!-- HERO -->
        <section class="relative bg-gradient-to-br from-[#0a2f2a] via-[#02221e] to-[#000000] py-24 sm:py-32">
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_top,white,transparent_60%)]"></div>

            <div class="relative px-4 text-center text-white">
                <h1 class="text-3xl font-extrabold tracking-tight sm:text-5xl">Login</h1>
                <p class="mt-3 text-sm text-gray-300">Home → Login</p>
            </div>
        </section>

        <!-- LOGIN CARD -->
        <section class="px-4 pb-20 -mt-20">
            <div
                class="max-w-md p-8 mx-auto border shadow-2xl backdrop-blur-xl bg-white/90 rounded-3xl sm:p-10 border-white/40">

                <!-- ICON + TITLE -->
                <div class="mb-8 text-center">
                    <div
                        class="w-14 h-14 mx-auto flex items-center justify-center rounded-full bg-[#0b3d36] text-white shadow-lg">
                        <i class="text-xl fa-solid fa-right-to-bracket"></i>
                    </div>
                    <h2 class="mt-4 text-3xl font-bold">Welcome Back</h2>
                    <p class="mt-1 text-sm text-gray-500">Login to continue your impact</p>
                </div>

                <!-- FORM -->
                <form class="space-y-5" action="{{ route('login_auth') }}" method="POST">
                    @csrf
                    <div>
                        <input type="email" name="email" placeholder="Email"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0b3d36] text-lg">
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0b3d36] text-lg">
                    </div>

                    <!-- OPTIONS -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 p-1 text-gray-700 rounded bg-white/80">
                            <input type="checkbox"
                                class="w-5 h-5 border border-black rounded focus:ring-2 focus:ring-[#0b3d36]"
                                name='remember'>
                            Remember me
                        </label>


                        <a href="{{ route('password.request') }}" class="text-[#0b3d36] font-semibold hover:underline">
                            Forgot password?
                        </a>
                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                        class="w-full mt-4 bg-gradient-to-br from-[#0a2f2a] via-[#0b3d36] to-[#06201d] p-3 text-white rounded-xl text-lg font-semibold hover:opacity-90 transition">
                        Login
                    </button>
                </form>

                <!-- FOOTER -->
                <p class="mt-6 text-sm text-center text-gray-600">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="font-semibold text-[#0b3d36] hover:underline">
                        Register
                    </a>
                </p>

            </div>
        </section>

    </section>
@endsection
