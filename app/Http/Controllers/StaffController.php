<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {       
        // echo "Staff Controller";
    }

    public function index(){
        $staffs = Admin::all();
        return view('admin.staff.list')->with('staffs', $staffs);
    }
}
