<!-- Top Navbar -->
<nav class="sticky top-0 z-30 flex items-center h-16 px-4 bg-white border-b border-gray-200 shadow-md md:px-6 w-full">

    <div class="flex-1 flex text-gray-800 gap-x-4 m-1">
        @yield('link')
    </div>

    <div class="flex items-center justify-end gap-4 md:gap-6">

        <div class="hidden w-px h-8 bg-gray-300 md:block"></div>

        <!-- Profile Dropdown -->
        <div class="relative">

            <button id="profileDropdownBtn"
                class="flex items-center gap-3 p-2 transition-colors rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <img src="{{ asset( 'storage/'. auth()->user()->image ?? 'img/team/team_1_1.png') }}"
                    class="object-cover border-2 border-gray-200 rounded-full w-9 h-9">

                <div class="flex-col items-start hidden leading-tight md:flex">
                    <span class="text-sm font-semibold text-gray-800">
                        {{ auth()->user()->full_name ?? 'Demo' }}
                    </span>

                    <span class="text-xs text-gray-500">
                        {{ auth()->user()->role->name ?? 'Head Manager' }}
                    </span>
                </div>

                <i class="hidden text-xs text-gray-400 fa-solid fa-chevron-down md:block"></i>

            </button>

            <!-- Dropdown -->
            <div id="profileDropdown"
                class="absolute right-0 z-50 hidden w-56 py-2 bg-white border border-gray-200 rounded-lg shadow-xl top-14 animate-fadeIn">

                <div class="py-1">

                    <a href="{{ route('admin.account_setting.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                        <i class="w-4 fa-solid fa-user"></i>
                        <span class="text-sm font-medium">Account Settings</span>
                    </a>

                    <a href="#" id="openPasswordModal"
                        class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                        <i class="w-4 fa-solid fa-lock"></i>
                        <span class="text-sm font-medium">Change Password</span>
                    </a>

                </div>

                <div class="my-1 border-t border-gray-200"></div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                        class="flex items-center gap-3 px-4 py-2.5 text-red-600 hover:bg-red-50 transition w-full text-left">

                        <i class="w-4 fa-solid fa-right-from-bracket"></i>
                        <span class="text-sm font-medium">Logout</span>

                    </button>
                </form>

            </div>
        </div>

    </div>

</nav>


<!-- Change Password Modal -->
<div id="changePasswordModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm">

    <div class="w-full max-w-md p-6 bg-white rounded-2xl shadow-2xl animate-fadeIn">

        <!-- Header -->
        <div class="flex items-center justify-between pb-4 border-b">

            <h3 class="text-lg font-semibold text-gray-800">
                Change Password
            </h3>

            <button id="closePasswordModal" class="text-gray-400 hover:text-gray-600">
                <i class="fa-solid fa-xmark"></i>
            </button>

        </div>

        <!-- Form -->
        <form action="{{ route('admin.account_setting.updatePassword') }}" method="POST" class="mt-5 space-y-4">

            @csrf
            <!-- Current Password -->
            <div>


                <label class="block mb-1 text-sm font-medium text-gray-700">
                    Current Password *
                </label>
                @if (session('success'))
                    <div class="px-4 py-3 mb-3 text-sm text-green-700 bg-green-100 border border-green-300 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="px-4 py-3 mb-3 text-sm text-red-700 bg-red-100 border border-red-300 rounded-lg">
                        <ul class="pl-4 list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="relative">

                    <input type="password" name="current_password"
                        class="password-input w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">

                    <i
                        class="togglePassword fa-solid fa-eye absolute text-gray-400 right-3 top-1/2 -translate-y-1/2 cursor-pointer"></i>

                </div>

            </div>


            <!-- New Password -->
            <div>

                <label class="block mb-1 text-sm font-medium text-gray-700">
                    New Password *
                </label>

                <div class="relative">

                    <input type="password" name="password"
                        class="password-input w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">

                    <i
                        class="togglePassword fa-solid fa-eye absolute text-gray-400 right-3 top-1/2 -translate-y-1/2 cursor-pointer"></i>

                </div>

            </div>


            <!-- Confirm Password -->
            <div>

                <label class="block mb-1 text-sm font-medium text-gray-700">
                    Confirm Password *
                </label>

                <div class="relative">

                    <input type="password" name="password_confirmation"
                        class="password-input w-full px-4 py-2.5 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">

                    <i
                        class="togglePassword fa-solid fa-eye absolute text-gray-400 right-3 top-1/2 -translate-y-1/2 cursor-pointer"></i>

                </div>

            </div>


            <div class="flex justify-end gap-3 pt-4">

                <button type="button" id="discardPasswordModal"
                    class="px-5 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
                    Discard
                </button>

                <button type="submit" class="px-5 py-2 text-white transition rounded-lg bg-blue-600 hover:bg-blue-700">
                    Save
                </button>

            </div>

        </form>

    </div>
</div>


<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px)
        }

        to {
            opacity: 1;
            transform: translateY(0)
        }
    }

    .animate-fadeIn {
        animation: fadeIn .2s ease-out
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const profileBtn = document.getElementById('profileDropdownBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        const openPasswordModal = document.getElementById('openPasswordModal');
        const modal = document.getElementById('changePasswordModal');
        const closeModal = document.getElementById('closePasswordModal');
        const discardModal = document.getElementById('discardPasswordModal');


        /* Dropdown */

        profileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function(e) {
            if (!profileDropdown.contains(e.target) && !profileBtn.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });


        /* Open Modal */

        openPasswordModal.addEventListener('click', function(e) {
            e.preventDefault();
            profileDropdown.classList.add('hidden');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        });


        /* Close Modal */

        function closePasswordModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        closeModal.addEventListener('click', closePasswordModal);
        discardModal.addEventListener('click', closePasswordModal);

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closePasswordModal();
            }
        });


        /* ESC close */

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePasswordModal();
            }
        });


        /* PASSWORD SHOW HIDE */

        document.querySelectorAll('.togglePassword').forEach(function(icon) {

            icon.addEventListener('click', function() {

                const input = this.previousElementSibling;

                if (input.type === 'password') {
                    input.type = 'text';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }

            });

        });

    });
</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
