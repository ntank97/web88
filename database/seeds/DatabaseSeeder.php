<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call($this->role());
        $this->call($this->admin());
    }
    private function role()
    {
//        $location = "Cộng tác viên, Quản trị viên, Người dùng";
//        $explode = explode(',',$location);
    //        $location = "Cộng tác viên, Quản trị viên, Người dùng";
    //        $explode = explode(',',$location);
            $location =array('Quản trị viên','Cộng tác viên','Người dùng');
            for ($i = 0; $i <= 2; $i++ )
            {
                DB::table('role')->insert([
                    'id' => $i+1,
                    'name' => $location[$i],
                ]);
            }

        DB::table('cate_web')->insert([
            [
                'name' => 'Mẫu web thương mại điện tử',
                'slug' => 'mau-web-thuong-mai-dien-tu',
            ],
            [
                'name' => 'Mẫu web giới thiệu công ty',
                'slug' => 'mau-website-gioi-thieu-cong-ty',
            ],
            [
                'name' => 'Mẫu web tin tức',
                'slug' => 'mau-web-tin-tuc',
            ]
        ]);

        DB::table('web')->insert([
            [
                'name' => 'Mẫu web bán hàng home Shop chuyên nghiệp giá rẻ',
                'slug' => 'mau-web-ban-hang-home-shop-chuyen-nghiep-gia-re',
                'image'=> 'httphaithu.com.png',
                'link'=> 'http://haithu.com/',
                'cate_id'=> '1',
            ],
            [
                'name' => 'Thiết kế website bán hàng quần áo',
                'slug' => 'thiet-ke-website-ban-hang-quan-ao',
                'image'=> 'lalaland-vu.herokuapp.com.png',
                'link'=> 'http://thoitranglalaland.vn/',
                'cate_id'=> '1',
            ],
            [
                'name' => 'Thiết kế website bán hàng hoa quả',
                'slug' => 'thiet-ke-website-ban-hang-hoa-qua',
                'image'=> 'thucpham.herokuapp.com.png',
                'link'=> 'https://thucpham.herokuapp.com/',
                'cate_id'=> '1',
            ]
        ]);
    }
    private function admin()
    {
            DB::table('admin')->insert([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'phone' => '0388346413',
                'level' => '1',
                'status' => '1',
                'created_at' => now(),
                'password' => bcrypt('123456'),
            ]);

    }
}
