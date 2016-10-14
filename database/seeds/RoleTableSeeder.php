<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
                'name' => 'admin',
            ]);
        DB::table('user_roles')->insert([
                'name' => 'client',
            ]);
        DB::table('user_roles')->insert([
                'name' => 'short',
            ]);
        DB::table('user_roles')->insert([
                'name' => 'student',
            ]);
    }
}
