<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $employee = new User();
       $employee->name = 'Employee Name';
       $employee->email = 'vinh@gmail.com';
       $employee->password = bcrypt('12345678');
       $employee->id_role = bcrypt('1');
       $employee->save();
    }
}
