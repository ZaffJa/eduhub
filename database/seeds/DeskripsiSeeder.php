<?php

use Illuminate\Database\Seeder;

class DeskripsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            ['type'=>'Realistic','jenis'=>'Realistik','deskripsi'=>'Realistik. Mereka adalah orang yang suka menyelesaikan masalah secara praktikal. Mereka mungkin mempunyai kelebihan dari segi atletik atau skil mekanikal. Mereka cenderung untuk bekerja dengan mesin, tumbuhan dan/atau haiwan. Mungkin cenderung untuk bekerja di lapangan. Mereka suka menyiapkan tugas. Mereka boleh diharap, menepati masa dan rajin. Karier yang berkemungkinan ada cef, jurutera, pegawai polis, pemandu kapal terbang, atlit, askar dan pegawai bomba.'],
            ['type'=>'Investigative','jenis'=>'Investigatif','deskripsi'=>'Investigatif. Mereka adalah orang yang suka aktiviti yang melibatkan pemikiran berbanding aktiviti fizikal. Mereka suka memerhati, belajar, menyiasat, menganalisa, menyelesaikan masalah. Mereka adalah orang saintifik, mereka tertarik dengan kejadian sesuatu benda. Mereka selalunya memiliki kelebihan dari segi matematik dan pemikiran logik. Mereka mungkin sedikit komples, selalu tertanya-tanya tentang sesuatu perkara, mementingkan kajian dan tenang. Karier yang berkemungkinan adalah arkitek, saintis komputer, doktor dan ahli farmasi.'],
            ['type'=>'Artistic','jenis'=>'Artistik','deskripsi'=>'Artistik. Mereka adalah orang yang inovatif, memiliki tahap intuitif yang tinggi dan suka bekerja dalam situasi yang tidak berstruktur dengan menggunakan imaginasi dan kreativiti. Mereka suka luahkan diri mereka melalui kerja. Karier yang berkemungkinan adalah ahli muzik, artis, penulis dan peguam.'],
            ['type'=>'Social','jenis'=>'Sosial','deskripsi'=>'Sosial.  Mereka adalah orang yang suka menolong orang lain, menyampaikan berita, mengajar dan menghasilkan sesuatu. Selalunya berkemahiran dalam bercakap. Mereka mempunyai empati yang tinggi terhadap orang lain. Karier yang berkemungkinan adalah pekerja sosial, kaunselor, ahli terapi dan cikgu.'],
            ['type'=>'Enterprising','jenis'=>'Berdaya usaha','deskripsi'=>'Berdaya usaha. Mereka adalah orang yang suka aktiviti berkaitan memulakan sesuatu seperti melaksanakan projek terutamanya bisnes. Mereka suka mempengaruh, memujuk, mengetuai kumpulan dan memilih keputusan. Mereka senang bosan dan kurang selesa dengan rutin harian. Mereka cenderung bekerja dengan cara unik mereka dan juga suka mengambil risiko. Karier yang berkemungkinan adalah pemilik bisnes, peguam, penjual, ejen hartanah dan admin sekolah.'],
            ['type'=>'Conventional','jenis'=>'Konvensional','deskripsi'=>'Konvensional. Mereka adalah orang yang suka bekerja dengan data, mempunyai skill numerik atau perkeranian dan suka melakukan sesuatu mengikut prosedur dan rutin. Mereka mahir dalam menyelaraskan orang, tempat dan acara. Karier yang berkemungkinan adalah akauntan, setiausaha, pembantu doktor'],

        ];


        foreach ($inputs as $input) {

            \App\Models\PersonalityType::where('type',$input['type'])->update([

                'jenis' => $input['jenis'],
                'deskripsi' => $input['deskripsi']

            ]);

        }
    }
}
