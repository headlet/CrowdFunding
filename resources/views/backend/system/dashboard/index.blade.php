@extends('backend.system.layout.master')
@section('title')
    Fund | Dashboard
@endsection

@section('link')
    <a @if (!request()->routeIs('admin.dashboard')) href="{{ route('admin.dashboard') }}" @endif
        class="py-1 transition-all
    {{ request()->routeIs('admin.dashboard')
        ? 'border-b-2 border-black cursor-default pointer-events-none opacity-70'
        : '' }}">
        <span class="texts whitespace-nowrap">DashBoard</span>
    </a>
@endsection

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm text-gray-500">Total Donation</p>
            <p class="text-xl font-semibold">$1,139,240.25</p>
            <span class="text-green-500 text-xs">+3.4% From last month</span>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm text-gray-500">Avg Donation</p>
            <p class="text-xl font-semibold">$231.20</p>
            <span class="text-green-500 text-xs">+1.02% From last month</span>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm text-gray-500">Total Revenue</p>
            <p class="text-xl font-semibold">$500,420.25</p>
            <span class="text-green-500 text-xs">+2.15% From last month</span>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm text-gray-500">Total Visitors</p>
            <p class="text-xl font-semibold">400,000</p>
            <span class="text-red-500 text-xs">-2.25% From last month</span>
        </div>
    </div>


    <div class="bg-white p-4 rounded shadow mb-6 w-full">
        <div class="text-xl font-bold p-4">Location</div>
        <iframe
            src="{{ $resources['contact']->map ?? 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d21637.8176375226!2d85.4032384!3d27.6955136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2snp!4v1773285326399!5m2!1sen!2snp' }}"
            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" class="rounded-xl">
        </iframe>

    </div>


    <!-- Revenue Chart -->
    <div class="bg-white p-4 rounded shadow mb-6 w-full">
        <div class="text-xl font-bold py-4">Monthly Donation & Withdraw Report</div>
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-4">
            <div>
                <p class="text-gray-500 text-sm">Revenue</p>
                <p class="text-xl font-semibold">$48,580</p>
                <span class="text-green-500 text-xs">+4.81% last year</span>
            </div>
            <div class="flex flex-wrap gap-2">
                <button class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-100">
                    This year
                </button>
                <button class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-100">
                    Decline
                </button>
            </div>
        </div>
        <div class="relative w-full h-64">
            <div id="chart" class="w-full h-full"></div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        let charts = document.querySelector("#chart");
        var options = {
            chart: {
                type: 'line',
                height: '100%',
                toolbar: {
                    show: true
                }
            },

            series: [{
                name: 'Revenue',
                data: [50000, 55000, 52000, 60000, 75000, 65000, 70000, 72000, 68000]
            }],

            xaxis: {
                categories: ['10 Apr', '26 May', '8 Jun', '22 Jul', '16 Aug', '19 Sept', '5 Oct', '13 Nov', '25 Dec']
            },

            stroke: {
                curve: 'smooth',
                width: 3,
                colors: ['rgba(132, 211, 94, 1)']
            },

            dataLabels: {
                enabled: false
            },

            grid: {
                borderColor: '#e5e7eb'
            }
        };

        new ApexCharts(charts, options).render();
    </script>
@endsection
