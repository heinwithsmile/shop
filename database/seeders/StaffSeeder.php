<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array(
            array(
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'admin'
            ),
            array(
                'name'=>'Manager',
                'email'=>'manager@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'manager'
            ),
        );
        DB::table('staffs')->insert($data);
    }
}
