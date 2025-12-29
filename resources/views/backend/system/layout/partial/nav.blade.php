<!-- Top Navbar -->
<nav class="flex justify-between items-center px-4 md:px-6 bg-white shadow-lg h-16">

    <!-- Search -->
    <form class="hidden sm:flex items-center w-md bg-gray-100 rounded-xl p-3 ">
        <input type="text" placeholder="Search anything..."
            class="flex-grow bg-transparent outline-none text-gray-700 placeholder-gray-400" />
        <button type="submit" class="text-gray-500 hover:text-gray-700 ml-2">
            <i class="fa-solid fa-search"></i>
        </button>
    </form>

    <!-- Right Section -->
    <div class="flex items-center gap-6 ">

        <!-- Notification -->
        <div class="relative cursor-pointer">
            <i class="fa-solid fa-bell text-xl text-gray-600 hover:text-gray-800"></i>
            <span
                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs
                       w-5 h-5 flex items-center justify-center rounded-full">
                4
            </span>
        </div>

        <!-- Profile Button -->
        <div id="menus" class="flex items-center gap-2 cursor-pointer select-none relative">
            <img src="{{ asset('img/team/team_1_1.png') }}" class="w-9 h-9 rounded-full border object-cover">

            <!-- Hide text on small screens -->
            <div class="hidden md:flex flex-col leading-tight">
                <span class="font-medium text-gray-700">Hiro Matcha</span>
                <span class="text-xs text-gray-400">Head Manager</span>
            </div>
        </div>

        <!-- Dropdown -->
        <div class="btn hidden absolute right-2 top-14 w-48 bg-white rounded-md shadow-lg p-4 z-50">
            <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
                <i class="fa-solid fa-user"></i> Account Settings
            </a>

            <a href="#" class="flex items-center gap-2 mt-3 text-gray-700 hover:text-blue-600">
                <i class="fa-solid fa-lock"></i> Change Password
            </a>

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="flex items-center gap-2 text-red-600 hover:text-red-800 w-full text-left">
                    <i class="fa-solid fa-right-from-bracket"></i> LogOut
                </button>
            </form>
        </div>

    </div>
</nav>

<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<script>
    $('#menus').on('click', function(e) {
        e.stopPropagation();
        $('.btn').toggleClass('hidden');
    });

    // Close dropdown when clicking outside
    $(document).on('click', function() {
        $('.btn').addClass('hidden');

    });
</script>
