<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

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
            'name' => 'test',
            'email' => 'sample@email.com',
            'password' => bcrypt('test1234'),
            'email_verified_at' => Carbon::now(),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
