<!-- Top Navbar -->
<nav class="sticky top-0 z-30 flex items-center h-16 px-4 bg-white border-b border-gray-200 shadow-md md:px-6 w-full">

    <div class="flex-1 flex text-gray-800 gap-x-4 m-1">
        @yield('link')
    </div>

    <!-- Right Section -->
    <div class="flex items-center justify-end gap-4 md:gap-6">


        <!-- Divider (hidden on mobile) -->
        <div class="hidden w-px h-8 bg-gray-300 md:block"></div>

        <!-- Profile Dropdown -->
        <div class="relative">
            <button id="profileDropdownBtn"
                class="flex items-center gap-3 p-2 transition-colors rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <!-- Profile Image -->
                <img src="{{ asset('img/team/team_1_1.png') }}" alt="Profile"
                    class="object-cover border-2 border-gray-200 rounded-full w-9 h-9">

                <!-- User Info (Hidden on small screens) -->
                <div class="flex-col items-start hidden leading-tight md:flex">
                    <span class="text-sm font-semibold text-gray-800">{{ auth()->user()->full_name ?? 'Demo' }}</span>
                    <span class="text-xs text-gray-500">{{ auth()->user()->role->name ?? 'Head Manager' }}</span>
                </div>

                <!-- Dropdown Arrow -->
                <i class="hidden text-xs text-gray-400 fa-solid fa-chevron-down md:block"></i>
            </button>

            <!-- Dropdown Menu -->
            <div id="profileDropdown"
                class="absolute right-0 z-50 hidden w-56 py-2 bg-white border border-gray-200 rounded-lg shadow-xl top-14 animate-fadeIn">

                <!-- User Info (Shown on mobile) -->
                <div class="px-4 py-3 border-b border-gray-200 md:hidden">
                    <p class="font-semibold text-gray-800">{{ auth()->user()->name ?? 'Demo' }}</p>
                    <p class="text-xs text-gray-500">{{ auth()->user()->email ?? 'hiro@example.com' }}</p>
                </div>

                <!-- Menu Items -->
                <div class="py-1">
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                        <i class="w-4 fa-solid fa-user"></i>
                        <span class="text-sm font-medium">Account Settings</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                        <i class="w-4 fa-solid fa-lock"></i>
                        <span class="text-sm font-medium">Change Password</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                        <i class="w-4 fa-solid fa-gear"></i>
                        <span class="text-sm font-medium">Preferences</span>
                    </a>
                </div>

                <!-- Divider -->
                <div class="my-1 border-t border-gray-200"></div>

                <!-- Logout -->
                <a href="{{ route('logout') }}" type="submit"
                    class="flex items-center gap-3 px-4 py-2.5 text-red-600 hover:bg-red-50 transition-colors w-full text-left">
                    <i class="w-4 fa-solid fa-right-from-bracket"></i>
                    <span class="text-sm font-medium">Logout</span>
                </a>

            </div>
        </div>

    </div>
</nav>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.2s ease-out;
    }

    @media (max-width: 768px) {
        body.dropdown-open {
            overflow: hidden;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileBtn = document.getElementById('profileDropdownBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        profileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function(e) {
            if (!profileDropdown.contains(e.target) && !profileBtn.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                profileDropdown.classList.add('hidden');
            }
        });

        profileDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
</script>

<!-- Font Awesome CDN (if not already included) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
