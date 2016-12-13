<?php

use Illuminate\Database\Seeder;

class SchoolTypeRequirements extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name'=>'Jenis Kebangsaan (C)','link'=>'http://www.moe.gov.my/v/pertanyaan-lazim'],
            ['name'=>'Jenis Kebangsaan (T)','link'=>'http://www.moe.gov.my/v/pertanyaan-lazim'],
            ['name'=>'Kebangsaan','link'=>'http://www.moe.gov.my/v/pertanyaan-lazim'],
            ['name'=>'Kolej Vokasional','link'=>'http://www.mysumber.com/permohonan-2015-kolej-vokasional-kv-dan-sekolah-teknik-smt.html'],
            ['name'=>'Sekolah Bimbingan','link'=>'http://www.moe.gov.my/v/pertanyaan-lazim'],
            ['name'=>'Sekolah Seni','link'=>'http://www.moe.gov.my/my/sekolah-seni-malaysia'],
            ['name'=>'Sekolah Sukan','link'=>'http://www.moe.gov.my/v/pertanyaan-lazim'],
            ['name'=>'SM Agama','link' => 'http://www.moe.gov.my/my/sabk-smka'],
            ['name'=>'SM Berasrama Penuh','link'=>'http://www.moe.gov.my/my/syarat-kemasukan-sbp'],
            ['name'=>'SM Kebangsaan','link'=>'http://www.moe.gov.my/v/pertanyaan-lazim'],
            ['name'=>'SM Khas','link'=>'http://umiwish.blogspot.com/2016/02/permohonan-sekolah-pendidikan-khas.html'],
            ['name'=>'SM Teknik','link'=>'http://www.mysumber.com/permohonan-2015-kolej-vokasional-kv-dan-sekolah-teknik-smt.html'],
            ['name'=>'SM + SR (Model Khas)','link'=>'http://www.moe.gov.my/v/pertanyaan-lazim'],
            ['name'=>'SMK Agama','link' => 'http://www.moe.gov.my/my/sabk-smka'],
        ];

        foreach($types as $type)
        {
            $schoolType = \App\Models\School\SchoolType::whereName($type['name'])->first();
            $schoolType->link = $type['link'];
            $schoolType->update();

        }
    }
}
