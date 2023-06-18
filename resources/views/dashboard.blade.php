@section('styles')
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;300;400;500&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kodchasan:ital,wght@0,300;1,200;1,300&family=Montserrat:ital,wght@0,200;0,300;0,800;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Parisienne&family=Playball&family=Poppins:ital,wght@0,100;0,200;0,300;0,800;0,900;1,100;1,200;1,300&family=Roboto+Condensed:wght@300;400;700&family=Roboto+Mono:ital,wght@0,100;1,100&family=Roboto:ital,wght@0,100;0,300;1,100&family=Rubik+Beastly&family=Teko:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>Charts.JS in Laravel </title>
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

                    <h1>Charts.JS </h1>
                    <canvas id="myChart" height="100px"></canvas>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var labels = {{ Js::from($labels) }};
        var users = {{ Js::from($data) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'Monthly User Sign Up Chart',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: users,
            }]
        };

        const config = {
            type: 'bar', //bar, line, pie, bubble
            data: data,
            options: {
                animation: true,
                // aspectRatio: 1,

                plugins: {
                    // title
                    legend: {
                        display: true
                    },
                    // detail in points
                    tooltip: {
                        enabled: true
                    }
                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

</x-app-layout>
