<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {       
        echo "Staff Controller";
    }

    public function index(){
        echo "OK";
    }
}
