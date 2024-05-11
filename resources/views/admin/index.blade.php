@extends('admin.layouts.master')
@section('title', 'Dashboard | Furniture Store ')
@section('page-name')
    Dashboard
@endsection
@push('styles')
@endpush
@section('content')
    <div class="calendar row my-3">
        <form action="{{ route('admin') }}" method="get">
            <label for="start">Start Date:</label>
            <input type="date" name="start" id="start">
            <label for="end">End Date:</label>
            <input type="date" name="end" id="end">
            <input type="submit" value="Filter">
        </form>
    </div>
    <div class="cards row my-3">
        <div class="col-md-3">
            <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded my-card">
                <div>
                    <h3 class="fs-2">${{ \App\Models\Order::getTotalSale() }}</h3>
                    <p class="fs-5">Sales</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded my-card">
                <div>
                    <h3 class="fs-2">4920</h3>
                    <p class="fs-5">Sales</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded my-card">
                <div>
                    <h3 class="fs-2">3899</h3>
                    <p class="fs-5">Delivery</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded my-card">
                <div>
                    <h3 class="fs-2">%25</h3>
                    <p class="fs-5">Increase</p>
                </div>
            </div>
        </div>
    </div>
    <div class="statistic my-3">
        <div class="my-card sale-card rounded">
            <canvas id="barChart"></canvas>
        </div>
        <div class="my-card order-type-card rounded">
            <canvas id="myDoughnutChart"></canvas>
        </div>
    </div>
    <div class="main-content">
        <div class="tbl-container bdr">
            <table class="table shadow-sm mt-3 bdr table-custom table-borderless">
                <thead class="table-heading">
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->amount }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td class="d-flex align-items-center">
                                <a href="{{ route('order.edit', ['order' => $order->id]) }}">
                                    <i class="lni lni-pencil-alt btn"></i>
                                </a>
                                <form class="d-inline-block" method="POST"
                                    action="{{ route('order.destroy', ['order' => $order->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-transparent">
                                        <i class="lni lni-trash-can btn"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        const data = {
            labels: @json($chartData['labels']),
            datasets: [{
                label: 'Profit',
                data: @json($chartData['data']),
                backgroundColor: '#475BE8',
                borderColor: 'rgba(0, 0, 0, 1)',
                borderWidth: 1
            }]
        };
        const config = {
            type: 'bar',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        const barChart = new Chart(
            document.getElementById('barChart'),
            config
        );
    </script>
    <script type="text/javascript">
        var ctx = document.getElementById('myDoughnutChart').getContext('2d');
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)'
                    ],
                    // borderColor: [
                    //     'rgba(255, 99, 132, 1)',
                    //     'rgba(54, 162, 235, 1)',
                    //     'rgba(255, 206, 86, 1)',
                    //     'rgba(75, 192, 192, 1)',
                    //     'rgba(153, 102, 255, 1)',
                    //     'rgba(255, 159, 64, 1)'
                    // ],
                    // borderWidth: 1
                }]
            },
            options: {
                cutoutPercentage: 10, // Adjust the size of the center hole
                responsive: true,
                maintainAspectRatio: true // Allow the chart to adjust its size based on container size
            }
        });
    </script>
@endpush
