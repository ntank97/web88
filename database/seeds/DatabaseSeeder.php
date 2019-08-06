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
<<<<<<< HEAD
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
=======
        $this->call($this->role());
    }
    private function role()
    {
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

>>>>>>> d315f39e72ddf6316e0f129b719d9ba136bd4f92
    }
}
