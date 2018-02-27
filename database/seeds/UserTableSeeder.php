<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'terrran@gmail.com',
            'password' => bcrypt('123123'),
            'is_admin' => true,
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
