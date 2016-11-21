<?php

use Illuminate\Database\Seeder;

class FileCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file_categories')->insert([
                'name' => 'Facility Image',
            ]);
        DB::table('file_categories')->insert([
                'name' => 'Provider Profile Pic',
            ]);
        DB::table('file_categories')->insert([
                'name' => 'Short Course Pic',
            ]);
        DB::table('file_categories')->insert([
                'name' => 'Faculty Image',
            ]);
    }
}
