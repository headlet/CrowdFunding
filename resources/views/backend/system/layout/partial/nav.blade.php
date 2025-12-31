<!-- Top Navbar -->
<nav
    class="sticky top-0 z-50 flex justify-between items-center px-4 md:px-6 bg-white shadow-md h-16 border-b border-gray-200">

    <!-- Left Section - Search -->
    <div class="flex-1 max-w-xs">
        <form
            class="flex items-center bg-gray-50 rounded-lg px-2 py-2 border border-gray-200 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-transparent transition-all">
            <i class="fa-solid fa-search text-gray-400 mr-3"></i>
            <input type="text" placeholder="Search campaigns, users..."
                class="flex-grow bg-transparent outline-none text-gray-700 placeholder-gray-400 text-sm" />
        </form>
    </div>

    <!-- Right Section -->
    <div class="flex items-center gap-4 md:gap-6 ml-4">

        <!-- Notification Icon -->
        <div class="relative cursor-pointer group">
            <button class="relative p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <i class="fa-solid fa-bell text-xl text-gray-600 group-hover:text-blue-600 transition-colors"></i>
                <span
                    class="absolute top-1 right-1 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full font-semibold shadow-md">
                    4
                </span>
            </button>
        </div>

        <!-- Divider (hidden on mobile) -->
        <div class="hidden md:block h-8 w-px bg-gray-300"></div>

        <!-- Profile Dropdown -->
        <div class="relative">
            <button id="profileDropdownBtn"
                class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">

                <!-- Profile Image -->
                <img src="{{ asset('img/team/team_1_1.png') }}" alt="Profile"
                    class="w-9 h-9 rounded-full border-2 border-gray-200 object-cover">

                <!-- User Info (Hidden on small screens) -->
                <div class="hidden md:flex flex-col items-start leading-tight">
                    <span class="font-semibold text-gray-800 text-sm">{{ auth()->user()->full_name ?? 'Demo' }}</span>
                    <span class="text-xs text-gray-500">{{ auth()->user()->role->name ?? 'Head Manager' }}</span>
                </div>

                <!-- Dropdown Arrow -->
                <i class="fa-solid fa-chevron-down text-xs text-gray-400 hidden md:block"></i>
            </button>

            <!-- Dropdown Menu -->
            <div id="profileDropdown"
                class="hidden absolute right-0 top-14 w-56 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-50 animate-fadeIn">

                <!-- User Info (Shown on mobile) -->
                <div class="md:hidden px-4 py-3 border-b border-gray-200">
                    <p class="font-semibold text-gray-800">{{ auth()->user()->name ?? 'Demo' }}</p>
                    <p class="text-xs text-gray-500">{{ auth()->user()->email ?? 'hiro@example.com' }}</p>
                </div>

                <!-- Menu Items -->
                <div class="py-1">
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                        <i class="fa-solid fa-user w-4"></i>
                        <span class="text-sm font-medium">Account Settings</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                        <i class="fa-solid fa-lock w-4"></i>
                        <span class="text-sm font-medium">Change Password</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                        <i class="fa-solid fa-gear w-4"></i>
                        <span class="text-sm font-medium">Preferences</span>
                    </a>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-200 my-1"></div>

                <!-- Logout -->

                <a href="{{ route('logout') }}" type="submit"
                    class="flex items-center gap-3 px-4 py-2.5 text-red-600 hover:bg-red-50 transition-colors w-full text-left">
                    <i class="fa-solid fa-right-from-bracket w-4"></i>
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
