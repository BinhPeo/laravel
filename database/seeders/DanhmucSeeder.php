<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhmucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('danhmuc')->insert([
            [
                'image' =>'1713346018_tui-xach-nu-louis-vuitton-lv-monogram-tuilerie-bezas-m43798-mau-nau-do-65c1fb1882e2d-06022024162544 ',
                'name'=>'Louis Vuitton','created_at'=>now()
            
            ],
            [
                'image' =>'1713346018_tui-xach-nu-louis-vuitton-lv-monogram-tuilerie-bezas-m43798-mau-nau-do-65c1fb1882e2d-06022024162544 ',
                'name'=>'Gucci','created_at'=>now()
            ],
            [
                'image' =>'1713346018_tui-xach-nu-louis-vuitton-lv-monogram-tuilerie-bezas-m43798-mau-nau-do-65c1fb1882e2d-06022024162544 ',
                'name'=>'Hermès','created_at'=>now()
            ],
            [
                'image' =>'1713346018_tui-xach-nu-louis-vuitton-lv-monogram-tuilerie-bezas-m43798-mau-nau-do-65c1fb1882e2d-06022024162544 ',
                'name'=>'Céline','created_at'=>now()
            ],
        ]);    
    }
}
