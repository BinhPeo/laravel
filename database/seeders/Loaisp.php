<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Loaisp extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loaisp')->insert([
            [
                
                'loai'=>'Louis Vuitton',
                'image' =>'1713346018_tui-xach-nu-louis-vuitton-lv-monogram-tuilerie-bezas-m43798-mau-nau-do-65c1fb1882e2d-06022024162544 ','created_at'=>now()
            
            ],
            [
                'loai'=>'Louis Vuitton',
                'image' =>'1713346018_tui-xach-nu-louis-vuitton-lv-monogram-tuilerie-bezas-m43798-mau-nau-do-65c1fb1882e2d-06022024162544 ','created_at'=>now()
            ],
        ]);    
    }
}
