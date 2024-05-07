<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
           [ 
            'name'=>'admin',
            'email'=>'onhbinh@gmail.com',
            'password'=>'12345678',
            'phone'=>'022636353',
            'status'=>1,
            'role'=>1,
            'created_at'=>now()
           ],
            [
                'name'=>'binhpeo',
                'email'=>'meow@gmail.com',
                'password'=>'12345678',
                'phone'=>'022636353',
                'status'=>1,
                'role'=>0,
                'created_at'=>now()
            ],
        ]);
    }
}
