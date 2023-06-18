@section('styles')
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;300;400;500&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kodchasan:ital,wght@0,300;1,200;1,300&family=Montserrat:ital,wght@0,200;0,300;0,800;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Parisienne&family=Playball&family=Poppins:ital,wght@0,100;0,200;0,300;0,800;0,900;1,100;1,200;1,300&family=Roboto+Condensed:wght@300;400;700&family=Roboto+Mono:ital,wght@0,100;1,100&family=Roboto:ital,wght@0,100;0,300;1,100&family=Rubik+Beastly&family=Teko:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>Charts.JS in Laravel Samples</title>
    </head>
    <style type="text/css">
        body {
            font-family: 'Roboto Mono', monospace;
        }

        h1 {
            text-align: center;
            font-size: 35px;
            font-weight: 900;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1>Charts.JS Samples</h1>
                    <canvas id="myChart" height="100px"></canvas>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const labels = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'असोज',
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'असोज',
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'असोज',
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'असोज',
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'माघ',
        ];
        const data = {
            labels: labels,
            datasets: [{
                    label: 'Monthly Activity Chart',
                    data: [
                        10, 59, 80, 81, 56, 55,
                        40, 65, 59, 80, 81, 56,
                        55, 77, 88, 10, 59, 80,
                        81, 56, 55, 40, 65, 59,
                        80, 81, 56, 55, 77, 99,
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Monthly Activity Chart 2',
                    data: [
                        40, 65, 57, 80, 81, 56,
                        10, 59, 80, 81, 56, 44,
                        80, 81, 56, 55, 77, 99,
                        55, 77, 88, 10, 59, 80,
                        81, 56, 55, 40, 65, 59,
                    ],
                    backgroundColor: [
                        // 'rgba(255, 99, 132, 0.2)',
                        // 'rgba(255, 159, 64, 0.2)',
                        // 'rgba(255, 205, 86, 0.2)',
                        // 'rgba(75, 192, 192, 0.2)',

                        'rgba(54, 162, 235, 0.2)',

                        // 'rgba(153, 102, 255, 0.2)',
                        // 'rgba(201, 203, 207, 0.2)',
                    ],
                    borderColor: [
                        // 'rgb(255, 99, 132)',
                        // 'rgb(255, 159, 64)',
                        // 'rgb(255, 205, 86)',
                        // 'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        // 'rgb(153, 102, 255)',
                        // 'rgb(201, 203, 207)',
                    ],
                    borderWidth: 0.5
                }
            ]
        };

        const config = {
            // doughnut, pie, bar, bubble, area, polarArea, radar, scatter
            type: 'radar',
            data: data,
            options: {
                // animation: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

</x-app-layout>
