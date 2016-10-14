<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(BankTypesTableSeeder::class);
        $this->call(ShortFieldsTableSeeder::class);
        $this->call(FileCategoryTableSeeder::class);
        $this->call(AdminRoleSeeder::class);

    }
}
