<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            ['email'=>'cuavip1999@gmail.com', 'password'=>bcrypt('123456')],
            ['email'=>'long@gmail.com', 'password'=>bcrypt('123456')],
            ['email'=>'linh@gmail.com', 'password'=>bcrypt('123456')],
            ['email'=>'nam@gmail.com', 'password'=>bcrypt('123456')],
        ];
        DB::table('clients')->insert($data);
    }
}
