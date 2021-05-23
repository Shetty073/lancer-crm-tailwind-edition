@extends('base')
@section('title', 'Dashboard')

@section('main-content')

<main class="px-1 lg:px-4 py-2 mx-2 ls:mx-10 my-5 h-screen">
    <div class="flex flex-wrap -mx-1 -mx-4 mb-16 justify-center">

        <div
            class="overflow-hidden rounded-lg shadow-lg px-4 py-3 sm:mr-5 mt-4 lg:w-2/12 w-11/12 bg-red-500 text-white">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <div class="text-5xl mb-3">26</div>
                    <div>Total Clients</div>
                </div>
                <div class="ml-8">
                    <i class="fas fa-user-friends fa-3x"></i>
                </div>
            </div>
        </div>

        <div
            class="overflow-hidden rounded-lg shadow-lg px-4 py-3 sm:mr-5 mt-4 lg:w-2/12 w-11/12 bg-yellow-500 text-white">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <div class="text-5xl mb-3">8</div>
                    <div>Active Clients</div>
                </div>
                <div class="ml-8">
                    <i class="fas fa-signal fa-3x"></i>
                </div>
            </div>
        </div>

        <div
            class="overflow-hidden rounded-lg shadow-lg px-4 py-3 sm:mr-5 mt-4 lg:w-2/12 w-11/12 bg-green-500 text-white">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <div class="text-5xl mb-3">1200</div>
                    <div>Monthly Earnings</div>
                </div>
                <div class="ml-8">
                    <i class="fas fa-dollar-sign fa-3x"></i>
                </div>
            </div>
        </div>

        <div
            class="overflow-hidden rounded-lg shadow-lg px-4 py-3 sm:mr-5 mt-4 lg:w-2/12 w-11/12 bg-pink-500 text-white">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <div class="text-5xl mb-3">160</div>
                    <div>Monthly Expenses</div>
                </div>
                <div class="ml-8">
                    <i class="fas fa-file-invoice-dollar fa-3x"></i>
                </div>
            </div>
        </div>

        <div
            class="overflow-hidden rounded-lg shadow-lg px-4 py-3 sm:mr-5 mt-4 lg:w-2/12 w-11/12 bg-blue-500 text-white">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <div class="text-5xl mb-3">5</div>
                    <div>Client Dues</div>
                </div>
                <div class="ml-8">
                    <i class="fas fa-coins fa-3x"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="flex flex-wrap mb-20">
        <div class="flex flex-col lg:w-6/12 w-100 lg:mb-0 mx-auto">
            <canvas id="chart-one-area"></canvas>
        </div>
        <div class="flex flex-col lg:w-6/12 w-100 lg:mb-0 mx-auto">
            <canvas id="chart-two-area"></canvas>
        </div>
    </div>

    <div class="flex flex-row">
        <canvas id="line-graph"></canvas>
    </div>

</main>

@endsection
@section('footer-scripts')
    <script type="text/javascript" src="{{ asset('chartjs/Chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dashboard_charts.js') }}"></script>
@endsection
