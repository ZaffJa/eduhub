<?php

use Illuminate\Database\Seeder;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        		'user_id' => 4,
                'role_id' => 1,
        	]);
        DB::table('roles')->insert([
        		'user_id' => 4,
                'role_id' => 2,
        	]);
        DB::table('roles')->insert([
        		'user_id' => 4,
                'role_id' => 3,
        	]);

        DB::table('institution_users')->insert([
        		'user_id' => 4,
                'institution_id' => 1,
        	]);
    }
}
