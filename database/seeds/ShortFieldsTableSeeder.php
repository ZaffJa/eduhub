<?php

use Illuminate\Database\Seeder;

class ShortFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('banktypes')->insert([
        		'name' => 'Agriculture',
        		'slug' => 'agriculture',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Herbs Production',
        		'slug' => 'hers-production',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Extension',
        		'slug' => 'extension',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Entrepreneurship',
        		'slug' => 'entrepreneurship',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Food Processing',
        		'slug' => 'food-processing',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Research',
        		'slug' => 'research',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Leadership',
        		'slug' => 'leadership',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Management and Organization',
        		'slug' => 'management-and-organization',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Communication',
        		'slug' => 'communication',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Character Development',
        		'slug' => 'character-development',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Motivation',
        		'slug' => 'motivation',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Professional Advancement',
        		'slug' => 'professional-advancement',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Machinery',
        		'slug' => 'machinery',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Language',
        		'slug' => 'language',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Computer Technology',
        		'slug' => 'computer-technology',
        	]);
       DB::table('banktypes')->insert([
        		'name' => 'Technical',
        		'slug' => 'technical',
        	]);
    }
}
