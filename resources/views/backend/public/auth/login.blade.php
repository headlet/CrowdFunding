@extends('backend.public.layouts.master')
@section('title')
Login
@endsection

@section('content')

<section class="bg-[#f6f8f7] text-gray-800">

    <!-- HERO -->
    <section class="relative bg-gradient-to-br from-[#0a2f2a] via-[#0b3d36] to-[#06201d] py-24 sm:py-32">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_top,white,transparent_60%)]"></div>

        <div class="relative text-center text-white px-4">
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Login</h1>
            <p class="mt-3 text-sm text-gray-300">Home → Login</p>
        </div>
    </section>

    <!-- LOGIN CARD -->
    <section class="-mt-20 pb-20 px-4">
        <div class="max-w-md mx-auto backdrop-blur-xl bg-white/90 rounded-3xl shadow-2xl p-8 sm:p-10 border border-white/40">

            <!-- ICON + TITLE -->
            <div class="text-center mb-8">
                <div class="w-14 h-14 mx-auto flex items-center justify-center rounded-full bg-[#0b3d36] text-white shadow-lg">
                    <i class="fa-solid fa-right-to-bracket text-xl"></i>
                </div>
                <h2 class="mt-4 text-3xl font-bold">Welcome Back</h2>
                <p class="text-sm text-gray-500 mt-1">Login to continue your impact</p>
            </div>

            <!-- FORM -->
            <form class="space-y-5" action="" method="POST">
                @csrf
                <div>
                    <input type="email" name="email" placeholder="Email" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0b3d36] text-lg">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0b3d36] text-lg">
                </div>

                <!-- OPTIONS -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 text-gray-700 bg-white/80 p-1 rounded">
                        <input type="checkbox" class="w-5 h-5 border border-black rounded focus:ring-2 focus:ring-[#0b3d36]">
                        Remember me
                    </label>


                    <a href="#" class="text-[#0b3d36] font-semibold hover:underline">
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
            <p class="text-center text-sm mt-6 text-gray-600">
                Don’t have an account?
                <a href="{{ route('register') }}" class="font-semibold text-[#0b3d36] hover:underline">
                    Register
                </a>
            </p>

        </div>
    </section>

</section>
@endsection