<?php

use Illuminate\Database\Seeder;

class BankTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banktypes')->insert([
        		'name' => 'AFFIN BANK BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'AL-RAJHI BANKING & INVESTMENT CORPORATION (MALAYSIA) BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'ALLIENCE BANK MALAYSIA BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'AMBANK/AMFINANCE'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'BANK ISLAM MALAYSIA BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'BANK KERJASAMA RAKYAT MALAYSIA BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'BANK MUAMALAT MALAYSIA BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'BANK OF AMERICA'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'BANK OF CHINA (MALAYSIA) BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'BANK OF TOKYO-MITSUBISHI UFJ (MALAYSIA) BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'BANK PERTANIAN MALAYSIA BERHAD (AGROBANK)'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'BANK SIMPANAN MALAYSIA BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'BNP PARIBAS MALAYSIA BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'CITIBANK BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'DEUTSCHE BANK (MALAYSIA) BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'HONG LEONG BANK'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'HSBC BANK MALAYSIA BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'INDUSTRIAL AND COMMERCIAL BANK OF CHINA (MALAYSIA) BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'J.P MORGAN CHASE BANK BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'KUWAIT FINANCE HOUSE (MALAYSIA) BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'MAYBANK'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'MIZUHO CORPORATE BANK MALAYSIA BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'OCBC BANK (MALAYSIA) BERHAD - IBG'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'PUBLIC BANK BERHAD/PUBLIC FINANCE BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'RHB BANK'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'STANDARD CHARTERED BANK MALAYSIA BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'SUMITOMO MITSUI CORPORATION (MALAYSIA) BERHAD'
        	]);
        DB::table('banktypes')->insert([
        		'name' => 'UNITED OVERSEAS BANK BERHAD'
        	]);
    }
}
