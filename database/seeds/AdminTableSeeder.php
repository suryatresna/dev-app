<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        	'name' 		=> 'Administrator',
            'email' 	=> 'surya.tresna@gmail.com',
            'password' 	=> bcrypt('secret'),
            'privilege'	=> 'admin',
            'phone'		=> '081993672667',
            'occupation'=> 'code, code, code'
        ]);
    }
}
