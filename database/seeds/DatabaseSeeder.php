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
                'icon' => 'http://thietkewebnhanh247.com/wp-content/uploads/2016/11/cart.png'
            ],
            [
                'name' => 'Mẫu web giới thiệu công ty',
                'slug' => 'mau-website-gioi-thieu-cong-ty',
                'icon' => 'http://thietkewebnhanh247.com/wp-content/uploads/2016/11/intro-web.png'
            ],
            [
                'name' => 'Mẫu web tin tức',
                'slug' => 'mau-web-tin-tuc',
                'icon' => 'http://thietkewebnhanh247.com/wp-content/uploads/2016/11/news.png'
            ],
            [
                'name' => 'Mẫu web âm nhạc',
                'slug' => 'mau-web-am-nhac',
                'icon' => 'http://thietkewebnhanh247.com/wp-content/uploads/2016/11/music.png'
            ],
            [
                'name' => 'Mẫu web ảnh viện áo cưới',
                'slug' => 'mau-web-anh-vien-ao-cuoi',
                'icon' => 'http://thietkewebnhanh247.com/wp-content/uploads/2016/11/heart.png'
            ],
            [
                'name' => 'Mẫu web bất động sản',
                'slug' => 'mau-web-bat-dong-san',
                'icon' => 'http://thietkewebnhanh247.com/wp-content/uploads/2016/11/real-estate.png'
            ],
            [
                'name' => 'Mẫu web giáo dục',
                'slug' => 'mau-web-giao-duc',
                'icon' => 'http://thietkewebnhanh247.com/wp-content/uploads/2016/11/education.png'
            ],
            [
                'name' => 'Mẫu web cá nhân',
                'slug' => 'mau-web-ca-nhan',
                'icon' => 'http://thietkewebnhanh247.com/wp-content/uploads/2016/11/personal.png'
            ],
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
                'cate_id'=> '2',
            ],
            [
                'name' => 'Thiết kế website bán hàng hoa quả',
                'slug' => 'thiet-ke-website-ban-hang-hoa-qua',
                'image'=> 'thucpham.herokuapp.com.png',
                'link'=> 'https://thucpham.herokuapp.com/',
                'cate_id'=> '3',
            ],
            [
                'name' => 'Mẫu web giới thiệu công ty',
                'slug' => 'mau-website-gioi-thieu-cong-ty',
                'image'=> 'ducthangth.com.png',
                'link'=> 'http://ducthangth.com/',
                'cate_id'=> '1',
            ],
        ]);

        DB::table('slider_content')->insert([
            [
                'title' => 'banner1-400x250.jpg',
                'image'=> 'banner1-400x250.jpg',
                'active' => 1,
            ],
            [
                'title' => 'Mẫu web bán hàng home Shop chuyên nghiệp giá rẻ',
                'image'=> 'dich-vu-auto-leech-bai-auto-post-400x250.jpg',
                'active' => 1,
            ],
            [
                'title' => 'Mẫu web bán hàng home Shop chuyên nghiệp giá rẻ',
                'image'=> 'gioi-thieu-dich-vu-thiet-ke-website-400x250.jpg',
                'active' => 1,
            ],
            [
                'title' => 'Mẫu web bán hàng home Shop chuyên nghiệp giá rẻ',
                'image'=> 'heading2-400x250.jpg',
                'active' => 1,
            ],
            [
                'title' => 'Mẫu web bán hàng home Shop chuyên nghiệp giá rẻ',
                'image'=> 'slide1111111111-400x250.jpg',
                'active' => 1,
            ],
            [
                'title' => 'Mẫu web bán hàng home Shop chuyên nghiệp giá rẻ',
                'image'=> 'thiet-ke-website-chuyen-nghiep11-400x250.jpg',
                'active' => 1,
            ],
            [
                'title' => 'Mẫu web bán hàng home Shop chuyên nghiệp giá rẻ',
                'image'=> 'thiet-ke-website-nha-hang-400x250.jpg',
                'active' => 1,
            ],
            [
                'title' => 'Mẫu web bán hàng home Shop chuyên nghiệp giá rẻ',
                'image'=> 'web-doanh-nghiep-400x250.png',
                'active' => 1,
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
