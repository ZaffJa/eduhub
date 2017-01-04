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
        // $this->call(RoleTableSeeder::class);
        // $this->call(AdminRoleSeeder::class);
        // $this->call(BankTypesTableSeeder::class);
        // $this->call(CareerImageFileCatergorySeeder::class);
//        $this->call(PersonalityTypeSeeder::class);
//        $this->call(CareerImageFileSeeder::class);
        // $this->call(FileCategoryTableSeeder::class);
        // $this->call(ShortFieldsTableSeeder::class);
        // $this->call(SpmSubjectSeeder::class);

//        $this->call(SchoolAdminSeeder::class);
//        $this->call(SchoolTypeSeeder::class);
        // $this->call(SchoolStreamSeeder::class);
        $this->call(SchoolTypeRequirements::class);
        $this->call(DeskripsiSeeder::class);
    }
}
