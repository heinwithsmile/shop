@extends('admin.layouts.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/backend/pages/dashboard.css') }}">
@endpush
@section('content')
    <div class="profile">
        <div class="add-product-heading">
            <div class="add-product-heading-left">
                <h3>Dashboard</h3>
            </div>
            <div class="add-product-heading-right">
                <div class="noti-bell">
                    <img src="{{ asset('storage/backend/images/icons/noti_bell.png') }}" alt="">
                    <span></span>
                </div>

                <img src="{{ asset('storage/backend/images/profile.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="date-search-sort">
        <div class="date">
            <form action="{{ route('admin') }}" method="get">
                <label for="start">Start Date:</label>
                <input type="date" name="start" id="start">
                <label for="end">End Date:</label>
                <input type="date" name="end" id="end">

                <input type="submit" value="Filter">
            </form>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="today-sales">
            <div class="card-text">
                Total Sales <br>
                <span>${{ \App\Models\Order::getTotalSale() }}</span> <br>
                We have sold 123 items
            </div>
        </div>
        <div class="today-revenue">
            <div class="card-text">
                Total Purchase <br>
                <span>$8.2K</span> <br>
                Avaliable to payout
            </div>
        </div>
        <div class="today-order">
            <div class="card-text">
                Number of Orders <br>
                <span>$18.2K</span> <br>
                Avaliable to payout
            </div>
        </div>
        <div class="total-revenue">
            <div class="revenue">
                <div>
                    <p>Sale Statics</p>
                </div>
            </div>

            <div class="up-percent">
                <span>$50.4K</span>
                <p> <img src="icons/Arrow 1.png" alt="">5% than last month</p>
            </div>

            <div class="chartCard">
                <div class="chartBox">
                    <canvas id="barChart"></canvas>
                </div>
            </div>

        </div>
        <div class="pieChart">
            <canvas id="pieChart" ></canvas>
        </div>
    </div>

    <div class="customer">
        <h3>Latest Orders</h3>

        <div class="customer-table">
            <table>
                <tr>
                    <th>
                        <input type="checkbox" name="" id="">
                    </th>
                    <th>
                        Product Name
                    </th>
                    <th>
                        Order ID
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Customer Name
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Amount
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                @foreach ($orders as $order)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ $order['order_id'] }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ $order['status'] }}</td>
                        <td>{{ $order['amount'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
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
        var ctx = document.getElementById('pieChart');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
        });
    </script>
@endsection
