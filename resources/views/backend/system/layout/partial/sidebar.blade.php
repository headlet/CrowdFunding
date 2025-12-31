<div
    class="sidebars w-64 h-screen fixed left-0 top-0 bg-gradient-to-b from-emerald-700 to-emerald-800 text-white transition-all duration-300 shadow-lime-100 flex flex-col">

    <!-- Header Section -->
    <div class="p-6 border-b border-green-500/30">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3 cmslogo">
                <div
                    class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md">
                    F
                </div>
                <span class="text-xl font-semibold whitespace-nowrap">Fund</span>
            </div>

            <button class="hover:bg-green-500/30 sidebtn p-2 rounded-lg transition-colors">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
        </div>
    </div>

    <!-- Menu Navigation -->
    <nav class="flex flex-col gap-2 p-4 flex-1 overflow-y-auto">
        <a href="{{ route('index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-500/30 transition-all">
            <i class="fas fa-arrow-left text-lg w-5 flex-shrink-0"></i>
            <span class="texts whitespace-nowrap">Visit Website</span>
        </a>

        <div class="my-2 border-t border-green-500/30"></div>

        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('dashboard') ? 'bg-green-700' : 'hover:bg-green-700' }}">
            <i class="fas fa-tachometer-alt text-lg w-5 flex-shrink-0"></i>
            <span class="texts whitespace-nowrap">Overview</span>
        </a>

        <a href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('') ? 'bg-green-700' : 'hover:bg-green-700' }}">
            <i class="fas fa-hand-holding-heart text-lg w-5 flex-shrink-0"></i>
            <span class="texts whitespace-nowrap">Donation</span>
        </a>

        <a href="{{ route('campaigns.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('campaigns.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
            <i class="fa-solid fa-bullhorn text-lg w-5 flex-shrink-0"></i>
            <span class="texts whitespace-nowrap">Campaigns</span>
        </a>

        <a href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs() ? 'bg-green-700' : 'hover:bg-green-700' }}">
            <i class="fas fa-users text-lg w-5 flex-shrink-0"></i>
            <span class="texts whitespace-nowrap">Community</span>
        </a>
    </nav>

    <!-- Bottom Section -->
    <div class="p-4 flex flex-col gap-2 border-t border-green-500/30 bg-green-700/50">
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-700 transition-all">
            <i class="fas fa-cog text-lg w-5 flex-shrink-0"></i>
            <span class="texts whitespace-nowrap">Settings</span>
        </a>

        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-700 transition-all">
            <i class="fas fa-question-circle text-lg w-5 flex-shrink-0"></i>
            <span class="texts whitespace-nowrap">Help Center</span>
        </a>

        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-700 transition-all">
            <i class="fas fa-flag text-lg w-5 flex-shrink-0"></i>
            <span class="texts whitespace-nowrap">Report</span>
        </a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('.sidebtn').on('click', function() {
        $('.sidebars').toggleClass('w-64 w-20');
        $('.cmslogo').toggleClass('hidden');
        $('.texts').toggleClass('hidden');
        if ($('.sidebars').hasClass('w-64')) {
            $('.contentss').css('width', 'calc(100% - 16rem)');
        } else {
            $('.contentss').css('width', 'calc(100% - 5rem)');
        }
    });
</script>
