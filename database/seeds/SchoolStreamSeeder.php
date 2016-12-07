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
        DB::table('school_streams')->delete();

        $streams = [
            ['stream'=>'Akademik(Sains/Sastera)'],
            ['stream'=>'Teknik dan Vokasional'],
            ['stream'=>'Agama'],
        ];

        foreach($streams as $stream)
        {
            \App\Models\School\SchoolStream::create($stream);
        }
    }
}
