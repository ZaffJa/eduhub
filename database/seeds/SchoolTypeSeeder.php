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
        DB::table('school_types')->delete();

        $types = [
            ['name'=>'Jenis Kebangsaan (C)'],
            ['name'=>'Jenis Kebangsaan (T)'],
            ['name'=>'Sekolah Menengah Kebangsaan'],
            ['name'=>'Kolej Vokasional',
             'requirements'=>'<ul>
                                <li>Warganegara Malaysia</li>
                                <li>Pemohon telah menduduki Pentaksiran Berdasarkan Sekolah (PBS)
                                    yang merangkurmi PT3, Pentaksiran Sekolah, Pentaksiran Aktivit
                                    Jasmani, Sukan dan Kokurikulum.
                                </li>
                                <li>Calon sihat tubuh badan</li>
                                <li>Calon bebas dari sakit kronik</li>
                                <li>Calon bidang elektrik dan elektronik, awam, industri kayu dan
                                    pembuat pakaian tidak rabun warna/buta warna
                                </li>
                                <li>Calon bebas daripada masalah mental</li>
                                <li>Calon berminat dengan program dipohon</li>
                              </ul>'],
            ['name'=>'Sekolah Bimbingan',
                'requirements'=>'<ul>
                                <li>Kanak-kanak Tanpa Dokumen di mana ibu bapanya adalah seorang warganegara atau salah seorang ibu bapanya adalah warganegara</li>
                                <li>Kanak-kanak Yatim Piatu yang tinggal di pusat/rumah jagaan kanak-kanak yang berdaftar dengan Jabatan Kebajikan Masyarakat</li>
                                <li>Kanak-Kanak Menghadapi Masalah Sosial  di mana ibu bapanya adalah seorang warganegara atau salah seorang ibu bapanya adalah warganegara</li>
                                <li>Murid Tercicir di mana yang tercicir dari sistem persekolahan berpanjangaj disebabkan kemiskinan dan ibu bapanya adalah seorang warganegara atau salah seorang ibu bapanya adalah warganegara</li>
                              </ul>'],
            ['name'=>'Sekolah Seni',
             'requirements'=>'<ul>
                                <li>Warganegara Malaysia</li>
                                <li>Berbakat dan berpotensi dalam bidang kesenian(Seni Visual/Tari/Teater/Muzik)
                                </li>
                                <li>Hanya permohonan secara \'Online\' akan diproses</li>
                                <li>Calon sihat tubuh badan</li>
                                <li>Lulus semua mata pelajaran dalam UPSR sekurang-kurangnya 3B dalam UPSR</li>
                                <li>Lulus dalam Sesi Serlahan Seni / Uji Bakat</li>
                                <li>Bersetuju menerima kemasukan ke SSeM yang ditawarkan mengikut bidang yang ditetapkan</li>
                                <li>Murid yang berjaya wajib tinggal di asrama dan tertakluk kepada peraturan yang ditetapkan</li>
                                <li>Mengemukakan rekod kesihatan murid</li>
                                <li>Mengemukakan semua dokumen asal semasa temuduga</li>
                                <li>Permohonan akan ditolak sekiranya calon memalsukan sebarang dokumen semasa temuduga</li>
                              </ul>'],
            ['name'=>'Sekolah Sukan',
                'requirements'=>'<ul>
                                <li>Pelajar-pelajar yang layak akan ditawarkan memasuki ke Sekolah Sukan Malaysia(SSM) melalui kaedah tertentu serta oleh pihak tertentu</li>
                                <li>Ujian Mengenalpasti Bakat (TID) yang dikendalikan oleh Unit Sukan JPN di peringkat negeri dan yang dikendalikan oleh BSSK di peringkat kebangsaan.</li>
                                <li>Melalui Program Talent Scouting (Ujian Mengenalpasti Atlet Berbakat) yang dijalankan sepanjang Kejohanan MSSM.</li>
                                <li><Calon yang dicadangkan oleh Persatuan Sukan Kebangsaan yang mendapat pengesahan daripada MSN sebagai atlet elit atau atlet pelapis negara./li>
                              </ul>'],
            ['name'=>'Sekolah Menengah Berasrama Penuh',
            'requirements'=>'<ul>
                                <li>Warganegara Malaysia</li>
                                <li>Dari Sekolah Kebangsaan</li>
                                <li>Memperoleh 5A dalam UPSR</li>
                                <li>Memperoleh sekurang-kurangnya 6A termasuk Sains dan Matematik dalam UPSR</li>
                                <li>Aktif dalam kokurikulum</li>
                             </ul>'],
            ['name'=>'Sekolah Menengah Khas',
                'requirements'=>'<ul>
                                <li>Berumur 13+ hingga 19+ tahun</li>
                                <li>disahkan oleh pengamal perubatan</li>
                                <li>dan boleh mengurus diri tanpa bantuan orang lain</li>
                                </ul>'],
            ['name'=>'Sekolah Menengah Teknik',
                'requirements'=>'<ul>
                                <li>Warganegara Malaysia</li>
                                <li>Pemohon telah menduduki Pentaksiran Berdasarkan Sekolah (PBS)
                                    yang merangkurmi PT3, Pentaksiran Sekolah, Pentaksiran Aktivit
                                    Jasmani, Sukan dan Kokurikulum.
                                </li>
                                <li>Calon sihar tubuh badan</li>
                                <li>Calon bebas dari sakit kronik</li>
                                <li>Calon bidang elektrik dan elektronik, awam, industri kayu dan
                                    pembuat pakaian tidak rabun warna/buta warna
                                </li>
                                <li>Calon bebas daripada masalah mental</li>
                                <li>Calon berminat dengan program dipohon</li>
                                <li>Calon memperolah sekurang-kurangya C bagi mata pelajran BM,BI,Matematik dan Kemahiran Hidup</li>
                                <li>Calon memperoleh sekurang-kurangnya D dan Band 4 bagi mata pelajaran Sains</li>
                              </ul>'],
            ['name'=>'Sekolah Menengah Kebangsaan Agama',
                'requirements'=>'<ul>
                                <li>Tingkatan Satu</li>
                                <li>Mendapat 6A/5A 1B ( SK )</li>
                                <li>Boleh membaca Al- Quran dan menulis jawi</li>
                                <li>Tahu sembahyang/solat dan beragama islam</li>
                                <li>Berumur 12 tahun atau 13 tahun yang lahir pada 31hb Disember (tahun semasa)</li>
                                <li>Lulus Pendidikan Islam</li>
                                <li>Sekurang-kurangnya 3A dalam Peperiksaan UPKK (Ujian Penilaian Kelas KAFA)</li>
                                <li>Pandai serba sedikit tentang Bahasa Arab</li>
                                <li>Memiliki 3 sijil berasaskan pendidikan islam</li>
                                <br>
                                <li>Tingkatan Empat</li>
                                <li>Lulus PT3, sekurang-kurangnya mendapat 4A</li>
                                <li>B dalam Bahasa Arab Komunikasi dan Pendidikan Islam</li>
                                <li>A dan B dalam lain-lain mata pelajaran</li>
                                <li>Lulus ujian PAFA dalam PMR</li>
                                <li>Berumur 16 tahun atau kurang</li>
                                <br>
                                <li>Tingkatan Enam Rendah</li>
                                <li>Lulus SPM</li>
                                <li>Kepujian dalam matapelajaran Bahasa Melayu</li>
                                <li>Kepujian dalam Bahasa Arab Komunikasi atau lulus Bahasa Arab Tinggi</li>
                                <li>Lulus matapelajaran Pengajian al-Quran dan as-Sunnah serta Pendidikan Syariah Islamiah</li>
                                <li>Berumur antara 17 dan 20 tahun</li>
                              </ul>'],
            ['name'=>'Maktab Rendah Sains Mara',
             'requirements'=>'<ul>
                                <li>Pelajar dan Ibu Bapa Mesti Warganegara Malaysia.</li>
                                <li>Pemohon hendaklah memperoleh keputusan 6A bagi MRSM Semenanjung Malaysia, 3A, 3B, A dalam Matematik dan tiada C, E, ,D bagi MRSM Malaysia dalam Ujian Pencapaian Sekolah Rendah (UPSR)</li>
                                <li>Pemohon hendaklah memperoleh keputusan 6A, 4B, A dalam Matematik dan Sains bagi MRSM Semenanjung Malaysia, 5A, 5B, A dalam Matematik dan Sains bagi MRSM Malaysia  dalam PT3</li>
                                <li>Pelajar yang sedang menuntut di Sekolah Berasrama Penuh (SBP) dan Sekolah Berasrama Penuh Integrasi (SBPI) Kementerian Pendidikan Malaysia tidak dibenarkan memohon dan tidak akan ditawarkan ke MRSM</li>
                               </ul>']
        ];

        foreach($types as $type)
        {
            \App\Models\School\SchoolType::create($type);
        }
    }
}
