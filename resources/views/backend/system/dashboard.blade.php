@extends('backend.system.layout.master')
@section('title')
    CMS|Dashboard
@endsection
@section('content')
    <!-- Dashboard Title -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h1 class="text-2xl font-semibold text-gray-700">Dashboard</h1>
        <div class="flex flex-wrap gap-2">
            <button class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">
                Last Week
            </button>
            <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                Export
            </button>
        </div>
    </div>

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

    <!-- Revenue Chart -->
    <div class="bg-white p-4 rounded shadow mb-6 w-full">
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
