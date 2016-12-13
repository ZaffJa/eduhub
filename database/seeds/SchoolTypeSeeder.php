<?php

use Illuminate\Database\Seeder;

class SchoolTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name'=>'Jenis Kebangsaan (C)'],
            ['name'=>'Jenis Kebangsaan (T)'],
            ['name'=>'Kebangsaan'],
            ['name'=>'Kolej Vokasional'],
            ['name'=>'Sekolah Bimbingan'],
            ['name'=>'Sekolah Seni'],
            ['name'=>'Sekolah Sukan'],
            ['name'=>'SM Agama'],
            ['name'=>'SM Berasrama Penuh'],
            ['name'=>'SM Kebangsaan'],
            ['name'=>'SM Khas'],
            ['name'=>'SM Teknik'],
            ['name'=>'SM + SR (Model Khas)'],
            ['name'=>'SMK Agama'],
        ];

        foreach($types as $type)
        {
            \App\Models\School\SchoolType::create($type);
        }
    }
}
