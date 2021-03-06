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
        DB::table('bank_types')->insert([
        		'name' => 'AFFIN BANK BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'AL-RAJHI BANKING & INVESTMENT CORPORATION (MALAYSIA) BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'ALLIENCE BANK MALAYSIA BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'AMBANK/AMFINANCE',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'BANK ISLAM MALAYSIA BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'BANK KERJASAMA RAKYAT MALAYSIA BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'BANK MUAMALAT MALAYSIA BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'BANK OF AMERICA',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'BANK OF CHINA (MALAYSIA) BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'BANK OF TOKYO-MITSUBISHI UFJ (MALAYSIA) BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'BANK PERTANIAN MALAYSIA BERHAD (AGROBANK)',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'BANK SIMPANAN MALAYSIA BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'BNP PARIBAS MALAYSIA BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'CITIBANK BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'DEUTSCHE BANK (MALAYSIA) BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'HONG LEONG BANK',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'HSBC BANK MALAYSIA BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'INDUSTRIAL AND COMMERCIAL BANK OF CHINA (MALAYSIA) BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'J.P MORGAN CHASE BANK BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'KUWAIT FINANCE HOUSE (MALAYSIA) BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'MAYBANK',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'MIZUHO CORPORATE BANK MALAYSIA BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'OCBC BANK (MALAYSIA) BERHAD - IBG',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'PUBLIC BANK BERHAD/PUBLIC FINANCE BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'RHB BANK',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'STANDARD CHARTERED BANK MALAYSIA BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'SUMITOMO MITSUI CORPORATION (MALAYSIA) BERHAD',
        	]);
        DB::table('bank_types')->insert([
        		'name' => 'UNITED OVERSEAS BANK BERHAD',
        	]);
    }
}
