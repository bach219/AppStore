<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data =[
            ['name'=>'Nguyễn Bachs', 'email'=>'bach@gmail.com', 'password'=>Hash::make('123456'), 'level'=>"Admin"],
            ['name'=>'ahihi', 'email'=>'long@gmail.com', 'password'=>Hash::make('123456'), 'level'=>"Mod"],
            ['name'=>'ahihi', 'email'=>'linh@gmail.com', 'password'=>Hash::make('123456'), 'level'=>"Mod"],
            ['name'=>'ahihi', 'email'=>'nam@gmail.com', 'password'=>Hash::make('123456'), 'level'=>"Mod"],
        ];
        DB::table('users')->insert($data);
    }
}
