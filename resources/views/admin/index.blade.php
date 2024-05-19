@extends('admin.layouts.master')
@section('title', 'Dashboard | Furniture Store ')
@section('page-name')
    Dashboard
@endsection
@push('styles')
@endpush
@section('content')
    @include('layouts.calendar')
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
    <section>
        <div class="table-container tableBorder">
            <table class="table shadow-sm mt-3 tableBorder table-custom table-borderless">
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
    </section>
@endsection
@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        const data = {
            labels: @json($chartData['labels']),
            datasets: [{
                label: 'Monthly Sales',
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
                labels: ['Account', 'One Time'],
                datasets: [{
                    label: 'Monthly Orders',
                    data: [12, 19],
                    backgroundColor: [
                        '#FFFFFF',
                        '#475BE8'
                    ],
                }]
            },
            options: {
                cutoutPercentage: 10,
                responsive: true,
                maintainAspectRatio: true
            }
        });
    </script>
@endpush
