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
       DB::table('short_fields')->insert([
        		'name' => 'Agriculture',
        		'slug' => 'agriculture',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Herbs Production',
        		'slug' => 'herbs-production',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Extension',
        		'slug' => 'extension',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Entrepreneurship',
        		'slug' => 'entrepreneurship',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Food Processing',
        		'slug' => 'food-processing',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Research',
        		'slug' => 'research',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Leadership',
        		'slug' => 'leadership',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Management and Organization',
        		'slug' => 'management-and-organization',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Communication',
        		'slug' => 'communication',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Character Development',
        		'slug' => 'character-development',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Motivation',
        		'slug' => 'motivation',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Professional Advancement',
        		'slug' => 'professional-advancement',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Machinery',
        		'slug' => 'machinery',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Language',
        		'slug' => 'language',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Computer Technology',
        		'slug' => 'computer-technology',
        	]);
       DB::table('short_fields')->insert([
        		'name' => 'Technical',
        		'slug' => 'technical',
        	]);
    }
}
