<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // User seeder will use the roles above created.
      //

   	    $this->call(UserTableSeeder::class);

        
        $this->call(ChinhanhTableSeeder::class);

        $this->call(RolePermissitonSeeder::class);
    }
}
