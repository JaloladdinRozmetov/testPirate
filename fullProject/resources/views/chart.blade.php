@extends('layouts.app')

@section('content')

    <canvas id="myChart" width="400" height="200"></canvas>


    @push('scripts')

        <script>
            var chartData = {!! json_encode($chartArray) !!};

            var labels = Object.keys(chartData);
            var dataValues = Object.values(chartData);

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: ' график доходов по дням',
                        data: dataValues,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
