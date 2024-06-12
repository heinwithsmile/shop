<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        

        $chartData = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep'],
            'data' => [100000, 80000, 84000, 75000, 80000, 50000, 70000, 80000, 70000]
        ];

        $pieChartData = [
            'labels' => ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            'datasets' => [
                'data' => [12, 19, 3, 5, 2, 3],
                'backgroundColor' => [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                ],
            ],
        ];

       if(!empty($request->all())){
            $start_date = $request->start;
            $end_date = $request->end;

            $orders = Order::whereDate('created_at', '>=', $start_date)
                                ->whereDate('created_at', '<=', $end_date)
                                ->orderBy('created_at', 'desc')
                                ->take(10)
                                ->get();
            
       }else{
        $orders = Order::orderBy('created_at', 'desc')
                        ->take(10)
                        ->get();
       }
       $latest_orders = Order::paginate(5);
        return view('admin.index')
            ->with('orders', $orders)
            ->with('chartData', $chartData)
            ->with('pieChartData', $pieChartData);
    }

    public function profile(){
        echo "My Profile";
    }
}
