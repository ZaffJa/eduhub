<?php

use Illuminate\Database\Seeder;

class CareerImageFileCatergorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file_categories')->insert([
        		'name' => 'Career Image',
        	]);
    }
}
