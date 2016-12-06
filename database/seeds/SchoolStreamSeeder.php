<?php

use Illuminate\Database\Seeder;

class SchoolStreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $streams = [
            ['stream'=>'Sains Tulen'],
            ['stream'=>'ICT'],
            ['stream'=>'Prinsip Perakaunan'],
            ['stream'=>'Ekonomi Asas'],
            ['stream'=>'Perdagangan'],
            ['stream'=>'Pendidikan Seni Visual'],
            ['stream'=>'Katering'],
            ['stream'=>'Landskap'],
        ];

        foreach($streams as $stream)
        {
            \App\Models\School\SchoolStream::create($stream);
        }
    }
}
