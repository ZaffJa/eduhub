<?php

use Illuminate\Database\Seeder;
use App\Models\Student\SpmSubject;
class SpmSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            ['name'=>'Bahasa Melayu','code'=>1103],
            ['name'=>'Bahasa Inggeris','code'=>1119],
            ['name'=>'Pendidikan Islam','code'=>1223,'requirements'=>'Diambil oleh pelajar beragama Islam sahaja'],
            ['name'=>'Pendidikan Moral','code'=>1225,'requirements'=>'Diambil oleh pelajar bukan Islam'],
            ['name'=>'Sejarah','code'=>1249],
            ['name'=>'Mathematics','code'=>1449],
            ['name'=>'Science','code'=>1511],
            ['name'=>'Kesusasteraan Melayu','code'=>2215],
            ['name'=>'Bahasa Arab Tinggi','code'=>2361],
            ['name'=>'Bahasa Cina','code'=>6351],
            ['name'=>'Bahasa Tamil','code'=>6354],
            ['name'=>'English for Science and Technology','code'=>6355],
            ['name'=>'Bahasa Iban','code'=>6356],
            ['name'=>'Bahasa Arab Komunikasi','code'=>6362],
            ['name'=>'Bahasa Perancis','code'=>9303],
            ['name'=>'Bahasa Punjabi','code'=>9378],
            ['name'=>'Additional Mathematics','code'=>3472],
            ['name'=>'Information and Communication Technology','code'=>3765],
            ['name'=>'Physics','code'=>4531],
            ['name'=>'Chemistry','code'=>4541],
            ['name'=>'Biology','code'=>4551],
            ['name'=>'Additional Science','code'=>4561],
            ['name'=>'Applied Science','code'=>4581],
            ['name'=>'Geografi','code'=>2280],
            ['name'=>'Pengajian Keusahawanan','code'=>3754],
            ['name'=>'Perdagangan','code'=>3755],
            ['name'=>'Prinsip Perakaunan','code'=>3756],
            ['name'=>'Ekonomi Asas','code'=>3757],
            ['name'=>'Tasawwur Islam','code'=>5226],
            ['name'=>'Pendidikan Al-Quran dan As-Sunnah','code'=>5227],
            ['name'=>'Pendidikan Syariah Islamiah','code'=>5228],
            ['name'=>'Perakaunan Perniagaan','code'=>8702],
            ['name'=>'Bible Knowledge','code'=>9221],
            ['name'=>'Pendidikan Seni Visual','code'=>2611],
            ['name'=>'Pendidikan Muzik','code'=>2621],
            ['name'=>'Pengetahuan Sains Sukan','code'=>4571],
            ['name'=>'Lukisan Kejuruteraan','code'=>3759],
            ['name'=>'Pengajian Kejuruteraan Mekanikal','code'=>3760],
            ['name'=>'Pengajian Kejuruteraan Awam','code'=>3761],
            ['name'=>'Pengajian Kejuruteraan Elektrik dan Elektronik','code'=>3762],
            ['name'=>'Rekacipta','code'=>3763],

        ];

        foreach($subjects as $subject)
        {
            SpmSubject::create($subject);
        }

    }
}
