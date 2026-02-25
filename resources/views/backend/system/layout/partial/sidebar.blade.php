<div
    class="fixed top-0 left-0 flex flex-col w-64 h-screen text-white transition-all duration-300 sidebars bg-gradient-to-b from-emerald-700 to-emerald-800 shadow-lime-100">

    <!-- Header Section -->
    <div class="p-6 border-b border-green-500/30">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3 cmslogo">
                <div
                    class="flex items-center justify-center w-10 h-10 text-lg font-bold text-white bg-green-500 rounded-full shadow-md">
                    F
                </div>
                <span class="text-xl font-semibold whitespace-nowrap">Fund</span>
            </div>

            <button class="p-2 transition-colors rounded-lg hover:bg-green-500/30 sidebtn">
                <i class="text-xl fa-solid fa-bars"></i>
            </button>
        </div>
    </div>

    <!-- Menu Navigation -->
    <nav class="flex flex-col flex-1 gap-2 p-4 overflow-y-auto">
        <a href="{{ route('index') }}"
            class="flex items-center gap-3 px-4 py-3 transition-all rounded-lg hover:bg-green-500/30">
            <i class="flex-shrink-0 w-5 text-lg fas fa-arrow-left"></i>
            <span class="texts whitespace-nowrap">Visit Website</span>
        </a>

        <div class="my-2 border-t border-green-500/30"></div>

        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-green-700' : 'hover:bg-green-700' }}">
            <i class="flex-shrink-0 w-5 text-lg fas fa-tachometer-alt"></i>
            <span class="texts whitespace-nowrap">Overview</span>
        </a>

        <a href="{{ route('admin.campaigns.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.campaigns.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
            <i class="flex-shrink-0 w-5 text-lg fa-solid fa-bullhorn"></i>
            <span class="texts whitespace-nowrap">Campaigns</span>
        </a>

        <a href="{{ route('admin.donation.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.donation.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
            <i class="flex-shrink-0 w-5 text-lg fas fa-hand-holding-heart"></i>
            <span class="texts whitespace-nowrap">Donation</span>
        </a>

        <a href="{{ route('admin.blog.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.blog.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
            <i class="flex-shrink-0 w-5 text-lg fas fa-blog"></i>
            <span class="texts whitespace-nowrap">Blog</span>
        </a>

        <a href="{{ route('admin.team.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.team.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
            <i class="flex-shrink-0 w-5 text-lg fa-solid fa-people-group"></i>
            <span class="texts whitespace-nowrap">Teams</span>
        </a>

        <a href="{{ route('admin.gallery.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.gallery.*') ? 'bg-green-700' : 'hover:bg-green-700' }}">
            <i class="flex-shrink-0 w-5 text-lg fas fa-image"></i>
            <span class="texts whitespace-nowrap">Gallery</span>
        </a>

        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all">
            <i class="flex-shrink-0 w-5 text-lg fas fa-users"></i>
            <span class="texts whitespace-nowrap">Community</span>
        </a>
    </nav>

    <!-- Bottom Section -->
    <div class="flex flex-col gap-2 p-4 border-t border-green-500/30 bg-green-700/50">
        <a href="#" class="flex items-center gap-3 px-4 py-3 transition-all rounded-lg hover:bg-green-700">
            <i class="flex-shrink-0 w-5 text-lg fas fa-home"></i>
            <span class="texts whitespace-nowrap">Front CMS</span>
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-3 transition-all rounded-lg hover:bg-green-700">
            <i class="flex-shrink-0 w-5 text-lg fas fa-cog"></i>
            <span class="texts whitespace-nowrap">Settings</span>
        </a>


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function handleResponsiveSidebar() {
        const sidebar = $('.sidebars');
        const texts = $('.sidebars .texts');
        const logo = $('.sidebars .cmslogo');

        if (window.innerWidth <= 768) {
            sidebar.removeClass('w-64').addClass('w-20');
            texts.addClass('hidden');
            logo.addClass('hidden');
        } else {
            sidebar.removeClass('w-20').addClass('w-64');
            texts.removeClass('hidden');
            logo.removeClass('hidden');
        }
    }

    $('.sidebtn').on('click', function() {
        const sidebar = $('.sidebars');
        const texts = $('.sidebars .texts');
        const logo = $('.sidebars .cmslogo');

        sidebar.toggleClass('w-64 w-20');

        if (sidebar.hasClass('w-20')) {
            texts.addClass('hidden');
            logo.addClass('hidden');
        } else {
            texts.removeClass('hidden');
            logo.removeClass('hidden');
        }
    });

    $(document).ready(handleResponsiveSidebar);
    $(window).on('resize', handleResponsiveSidebar);
</script>
