@extends('backend.system.layout.master')
@section('title')
    CMS|Dashboard
@endsection
@section('content')
    <main class="p-6 flex-1 overflow-y-auto">
        <!-- Dashboard Title -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-700">Dashboard</h1>
            <div class="flex gap-2">
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
            <div class="flex justify-between items-center mb-4">
                <div>
                    <p class="text-gray-500 text-sm">Revenue</p>
                    <p class="text-xl font-semibold">$48,580</p>
                    <span class="text-green-500 text-xs">+4.81% last year</span>
                </div>
                <div class="flex gap-2">
                    <button class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-100">
                        This year
                    </button>
                    <button class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-100">
                        Decline
                    </button>
                </div>
            </div>
            <div class="bg-white p-4 rounded shadow mb-6 w-full">
                <div class="relative w-full h-64">
                    <div id="chart" class="w-full h-auto"></div>
                </div>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-700 font-semibold mb-4">Transactions</h2>
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left text-gray-500 text-sm border-b">
                        <th class="py-2">Customer ID</th>
                        <th class="py-2">Type</th>
                        <th class="py-2">Location</th>
                        <th class="py-2">Date</th>
                        <th class="py-2">Status</th>
                        <th class="py-2">Amount</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 flex items-center gap-2">
                            <span
                                class="w-6 h-6 rounded-full bg-blue-400 text-white flex items-center justify-center">A</span>
                            Aaron Alexander
                        </td>
                        <td class="py-2">Humanity</td>
                        <td class="py-2">Jakarta, Indonesia</td>
                        <td class="py-2">24/01/2024</td>
                        <td class="py-2">
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">Approved</span>
                        </td>
                        <td class="py-2">$402.00</td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 flex items-center gap-2">
                            <span
                                class="w-6 h-6 rounded-full bg-green-400 text-white flex items-center justify-center">M</span>
                            Michelle Joaquin
                        </td>
                        <td class="py-2">Health</td>
                        <td class="py-2">Seoul, South Korea</td>
                        <td class="py-2">24/01/2024</td>
                        <td class="py-2">
                            <span class="px-2 py-1 text-xs bg-red-100 text-red-600 rounded-full">Declined</span>
                        </td>
                        <td class="py-2">$210.50</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
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
