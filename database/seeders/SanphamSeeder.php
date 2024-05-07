<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sanpham')->insert([
            [
                'name' => 'Túi xách Louis Vuitton',
                'price' => 10000000,
                'sale' => 0,
                'image' =>'1713346018_tui-xach-nu-louis-vuitton-lv-monogram-tuilerie-bezas-m43798-mau-nau-do-65c1fb1882e2d-06022024162544 ',
                'hot' => 0,
                'id_danhmuc' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Ví Louis Vuitton',
                'price' => 8000000,
                'sale' => 3000000,
                'image'=>'1713346036_tui-2.jpg',
                'hot' => 1,
                'id_danhmuc' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Áo khoác Louis Vuitton',
                'price' => 12000000,
                'sale' => 5000000,
                'image'=>'1713346084_794905512b7af7bfe0730718d1d06f01_tn.jpg',
                'hot' => 0,
                'id_danhmuc' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Giày Louis Vuitton',
                'price' => 9000000,
                'sale' => 4000000,
                'image'=>'1713346122_Giay-Louis-Vuitton-LV-Trainer-White-Black-White-1A9JGB-1A9JG3-1A9JGJ-1A9JG9-trang-den-sieu-cap-gia-re-ha-noi.jpg',
                'hot' => 0,
                'id_danhmuc' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Balo Louis Vuitton',
                'price' => 15000000,
                'sale' => 0,
                'image'=>'1713346171_Balo-nam-nu-da-bo-LV.jpg',
                'hot' => 1,
                'id_danhmuc' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Áo sơ mi Louis Vuitton',
                'price' => 18000000,
                'sale' => 0,
                'image'=>'1713346219_Ao-thun-cao-cap-Louis-Vuitton.jpg',
                'hot' => 1,
                'id_danhmuc' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Quần jeans Louis Vuitton',
                'price' => 22000000,
                'sale' => 5000000,
                'image'=>'1713346264_quan-louis-vuitton-damier-waves-monogram-chuan-authentic-1.webp',
                'hot' => 0,
                'id_danhmuc' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Veston Louis Vuitton',
                'price' => 28000000,
                'sale' => 0,
                'image'=>'1713346335_5053815bo_vest_louis_vuitton_monogram_chuan_authentic.jpg',
                'hot' => 1,
                'id_danhmuc' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Dép Louis Vuitton',
                'price' => 6000000,
                'sale' => 2000000,
                'image'=>'1713346409_dep-nam-lv-sieu-cap-11.jpg',
                'hot' => 0,
                'id_danhmuc' => 1,
                'created_at' => now()
            ],
            [
                'name' => 'Áo len Louis Vuitton',
                'price' => 15000000,
                'sale' => 0,
                'image'=>'1713346428_ao-len-louis-vuitton-logo-wool-blend-chuan-authentic-1.webp',
                'hot' => 1,
                'id_danhmuc' => 1,
                'created_at' => now()
            ],
            // 
            [
                'name' => 'Đồng hồ Gucci',
                'price' => 12000000,
                'sale' => 0,
                'image'=>'1713346475_set-dong-ho-nu-day-deo-gucci-g-frame-quartz-ladies-watch-ya147404-mau-xanh-green-657027e852f3d-06122023145104.jpg',
                'hot' => 1,
                'id_danhmuc' => 2,
                'created_at' => now()
            ],
            [
                'name' => 'Mũ tròn Gucci',
                'price' => 8000000,
                'sale' => 3500000,
                'image'=>'1713346510_mu-tron-gucci-gg-canvas-bucket-hat-mau-nau-size-s-629a3aa536d2f-03062022234525.jpg',
                'hot' => 0,
                'id_danhmuc' => 2,
                'created_at' => now()
            ],
            [
                'name' => 'Nước hoa Gucci',
                'price' => 15000000,
                'sale' => 5000000,
                'image'=>'1713346545_nuoc-hoa-nu-gucci-bloom-ambrosia-di-fiori-edp-5ml-641818afcaf61-20032023152623.jpg',
                'hot' => 1,
                'id_danhmuc' => 2,
                'created_at' => now()
            ],
            [
                'name' => 'Nước hoa nữ Gucci',
                'price' => 10000000,
                'sale' => 4000000,
                'image'=>'1713346624_dep-nu-gucci-mules-with-embossed-logo-in-wild-rose-rubber-624730j8700-mau-hong-65fbd3e16f1a7-21032024132953.jpg',
                'hot' => 0,
                'id_danhmuc' => 2,
                'created_at' => now()
            ],
            [
                'name' => 'Balo Gucci',
                'price' => 18000000,
                'sale' => 0,
                'image'=>'1713346718_tải xuống.jpg',
                'hot' => 1,
                'id_danhmuc' => 2,
                'created_at' => now()
            ],
            [
                'name' => 'Khăn quàng cổ Gucci',
                'price' => 1500000,
                'sale' => 0,
                'image'=>'1713347083_tải xuống (1).jpg',
                'hot' => 1,
                'id_danhmuc' => 2,
                'created_at' => now()
            ],
            [
                'name' => 'Son môi Gucci',
                'price' => 500000,
                'sale' => 200000,
                'image'=>'1713347135_tải xuống (2).jpg',
                'hot' => 0,
                'id_danhmuc' => 2,
                'created_at' => now()
            ],
            [
                'name' => 'Mũ bảo hiểm Gucci',
                'price' => 2500000,
                'sale' => 0,
                'image'=>'1713347320_tải xuống (3).jpg',
                'hot' => 1,
                'id_danhmuc' => 2,
                'created_at' => now()
            ],
            [
                'name' => 'Vali du lịch Gucci',
                'price' => 3500000,
                'sale' => 500000,
                'image'=>'1713347372_tải xuống (4).jpg',
                'hot' => 0,
                'id_danhmuc' => 2,
                'created_at' => now()
            ],
            [
                'name' => 'Đồng hồ Gucci',
                'price' => 8000000,
                'sale' => 0,
                'image'=>'1713347409_tải xuống (5).jpg',
                'hot' => 1,
                'id_danhmuc' => 2,
                'created_at' => now()
            ],
            // 
            [
                'name' => 'Nước hoa Chanel',
                'price' => 2000000,
                'sale' => 0,
                'image'=>'1713347475_tải xuống (6).jpg',
                'hot' => 1,
                'id_danhmuc' => 3,
                'created_at' => now()
            ],
            [
                'name' => 'Túi xách Chanel',
                'price' => 5000000,
                'sale' => 1000000,
                'image'=>'1713347575_tải xuống (7).jpg',
                'hot' => 0,
                'id_danhmuc' => 3,
                'created_at' => now()
            ],
            [
                'name' => 'Son môi Chanel',
                'price' => 1500000,
                'sale' => 0,
                'image'=>'1713346624_dep-nu-gucci-mules-with-embossed-logo-in-wild-rose-rubber-624730j8700-mau-hong-65fbd3e16f1a7-21032024132953.jpg',
                'hot' => 1,
                'id_danhmuc' => 3,
                'created_at' => now()
            ],
            [
                'name' => 'Kính mát Chanel',
                'price' => 3000000,
                'sale' => 500000,
                'image'=>'',
                'hot' => 0,
                'id_danhmuc' => 3,
                'created_at' => now()
            ],
            [
                'name' => 'Ví Chanel',
                'price' => 2500000,
                'sale' => 0,
                'image'=>'',
                'hot' => 1,
                'id_danhmuc' => 3,
                'created_at' => now()
            ],
            [
                'name' => 'Áo sơ mi Chanel',
                'price' => 3000000,
                'sale' => 0,
                'image'=>'1713347776_tải xuống (8).jpg',
                'hot' => 1,
                'id_danhmuc' => 3,
                'created_at' => now()
            ],
            [
                'name' => 'Váy Chanel',
                'price' => 5000000,
                'sale' => 1000000,
                'image'=>'1713347820_tải xuống (9).jpg',
                'hot' => 0,
                'id_danhmuc' => 3,
                'created_at' => now()
            ],
            [
                'name' => 'Quần jeans Chanel',
                'price' => 2500000,
                'sale' => 0,
                'image'=>'1713347876_tải xuống (10).jpg',
                'hot' => 1,
                'id_danhmuc' => 3,
                'created_at' => now()
            ],
            [
                'name' => 'Áo khoác Chanel',
                'price' => 4500000,
                'sale' => 500000,
                'image'=>'1713347941_tải xuống (11).jpg',
                'hot' => 0,
                'id_danhmuc' => 3,
                'created_at' => now()
            ],
            [
                'name' => 'Bộ đồ Chanel',
                'price' => 6000000,
                'sale' => 0,
                'image'=>'1713348095_tải xuống (12).jpg',
                'hot' => 1,
                'id_danhmuc' => 3,
                'created_at' => now()
            ],
            // 
            [
                'name' => 'Nước hoa Dior',
                'price' => 2500000,
                'sale' => 0,
                'image'=>'1713348685_tải xuống (21).jpg',
                'hot' => 1,
                'id_danhmuc' => 4,
                'created_at' => now()
            ],
            [
                'name' => 'Túi xách Dior',
                'price' => 8000000,
                'sale' => 1500000,
                'image'=>'1713348641_tải xuống (20).jpg',
                'hot' => 0,
                'id_danhmuc' => 4,
                'created_at' => now()
            ],
            [
                'name' => 'Son môi Dior',
                'price' => 1200000,
                'sale' => 0,
                'image'=>'1713348602_tải xuống (19).jpg',
                'hot' => 1,
                'id_danhmuc' => 4,
                'created_at' => now()
            ],
            [
                'name' => 'Kính mát Dior',
                'price' => 3500000,
                'sale' => 500000,
                'image'=>'1713348562_tải xuống (18).jpg',
                'hot' => 0,
                'id_danhmuc' => 4,
                'created_at' => now()
            ],
            [
                'name' => 'Ví Dior',
                'price' => 3000000,
                'sale' => 0,
                'image'=>'1713348520_tải xuống (17).jpg',
                'hot' => 1,
                'id_danhmuc' => 4,
                'created_at' => now()
            ],
            [
                'name' => 'Áo sơ mi Dior',
                'price' => 3500000,
                'sale' => 0,
                'image'=>'1713348297_tải xuống (14).jpg',
                'hot' => 1,
                'id_danhmuc' => 4,
                'created_at' => now()
            ],
            [
                'name' => 'Váy Dior',
                'price' => 6000000,
                'sale' => 1000000,
                'image'=>'1713348354_tải xuống (15).jpg',
                'hot' => 0,
                'id_danhmuc' => 4,
                'created_at' => now()
            ],
            [
                'name' => 'Quần jeans Dior',
                'price' => 4000000,
                'sale' => 0,
                'image'=>'1713348417_quan-dior-nam-chuan-chinh-hang-3.webp',
                'hot' => 1,
                'id_danhmuc' => 4,
                'created_at' => now()
            ],
            [
                'name' => 'Áo khoác Dior',
                'price' => 5500000,
                'sale' => 800000,
                'image'=>'1713348211_tải xuống (13).jpg',
                'hot' => 0,
                'id_danhmuc' => 4,
                'created_at' => now()
            ],
            [
                'name' => 'Bộ đồ Dior',
                'price' => 7000000,
                'sale' => 0,
                'image'=>'1713348472_tải xuống (16).jpg',
                'hot' => 1,
                'id_danhmuc' => 4,
                'created_at' => now()
            ],
            // 
            
        ]);
    }
}