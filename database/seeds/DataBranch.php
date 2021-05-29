<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DataBranch extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branch')->insert([
            'name_branch'=>'320 đường 2 tháng 9',
            'image_branch'=>'../public/image/image_branch/vinh.jpg',
            'director_branch'=>'Ho Van Vinh',
            'email_branch'=>'vinhvip123@gmail.com',
            'phone_branch'=>'0705944149',
            'local_branch'=>'320 đường 2 tháng 9'
        ]);
    }
}
