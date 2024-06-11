<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StaffController extends Controller
{
    public function __construct()
    {       
        // echo "Staff Controller";
    }

    public function index(){
        $staffs = User::all();
        return view('admin.staff.list')->with('staffs', $staffs);
    }
}
