<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FolderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = ['Priv','Biz','Family'];

            DB::table('folders')->insert([
                'title' => $title,
                'created_at' => Cardon::now(),
                'updated_at' => Cardon::now(),
            ]);     
    }
}
