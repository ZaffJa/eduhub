<?php

use Illuminate\Database\Seeder;
use App\Models\File;

class CareerImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $careers = [
            ['type_id'=>1,'category_id'=>6,'filename'=>'accountant','path'=>'career/accountant.jpg','mime'=>'jpeg','size'=>305660,'personality_type_id'=> 6],
            ['type_id'=>1,'category_id'=>6,'filename'=>'architect','path'=>'career/architect.jpeg','mime'=>'jpeg','size'=>3270341,'personality_type_id'=> 2],
            ['type_id'=>1,'category_id'=>6,'filename'=>'artist','path'=>'career/artist.jpg','mime'=>'jpeg','size'=>321067,'personality_type_id'=> 3],
            ['type_id'=>1,'category_id'=>6,'filename'=>'athlete','path'=>'career/athlete.jpeg','mime'=>'jpeg','size'=>8792474,'personality_type_id'=> 1],
            ['type_id'=>1,'category_id'=>6,'filename'=>'business man','path'=>'career/business man.jpg','mime'=>'jpeg','size'=>553674,'personality_type_id'=> 5],
            ['type_id'=>1,'category_id'=>6,'filename'=>'chef','path'=>'career/chef.jpg','mime'=>'jpeg','size'=>3434392,'personality_type_id'=> 1],
            ['type_id'=>1,'category_id'=>6,'filename'=>'computer scientist','path'=>'career/computer scientist.jpeg','mime'=>'jpeg','size'=>5871414,'personality_type_id'=> 2],
            ['type_id'=>1,'category_id'=>6,'filename'=>'dentist','path'=>'career/dentist.jpeg','mime'=>'jpeg','size'=>3275631,'personality_type_id'=> 4],
            ['type_id'=>1,'category_id'=>6,'filename'=>'dentist','path'=>'career/dentist.jpeg','mime'=>'jpeg','size'=>3275631,'personality_type_id'=> 6],
            ['type_id'=>1,'category_id'=>6,'filename'=>'doctor','path'=>'career/doctor.jpeg','mime'=>'jpeg','size'=>1363977,'personality_type_id'=> 2],
            ['type_id'=>1,'category_id'=>6,'filename'=>'engineer','path'=>'career/engineer.jpeg','mime'=>'jpeg','size'=>2452233,'personality_type_id'=> 1],
            ['type_id'=>1,'category_id'=>6,'filename'=>'firefighter','path'=>'career/firefighter.jpg','mime'=>'jpeg','size'=>770228,'personality_type_id'=> 1],
            ['type_id'=>1,'category_id'=>6,'filename'=>'graphic desingner','path'=>'career/graphic desingner.jpg','mime'=>'jpeg','size'=>445113,'personality_type_id'=> 3],
            ['type_id'=>1,'category_id'=>6,'filename'=>'interior designer','path'=>'career/interior designer.jpg','mime'=>'jpeg','size'=>9317604,'personality_type_id'=> 3],
            ['type_id'=>1,'category_id'=>6,'filename'=>'judge','path'=>'career/judge.jpg','mime'=>'jpeg','size'=>557721,'personality_type_id'=> 5],
            ['type_id'=>1,'category_id'=>6,'filename'=>'mechanic','path'=>'career/mechanic.jpg','mime'=>'jpeg','size'=>1321199,'personality_type_id'=> 1],
            ['type_id'=>1,'category_id'=>6,'filename'=>'musician','path'=>'career/musician.jpeg','mime'=>'jpeg','size'=>2427530,'personality_type_id'=> 3],
            ['type_id'=>1,'category_id'=>6,'filename'=>'pharmacist','path'=>'career/pharmacist.jpg','mime'=>'jpeg','size'=>229939,'personality_type_id'=> 2],
            ['type_id'=>1,'category_id'=>6,'filename'=>'pilot','path'=>'career/pilot.jpg','mime'=>'jpeg','size'=>6000854,'personality_type_id'=> 1],
            ['type_id'=>1,'category_id'=>6,'filename'=>'police officer','path'=>'career/police officer.jpeg','mime'=>'jpeg','size'=>3832372,'personality_type_id'=> 1],
            ['type_id'=>1,'category_id'=>6,'filename'=>'secretary','path'=>'career/secretary.jpg','mime'=>'jpeg','size'=>395096,'personality_type_id'=> 6],
            ['type_id'=>1,'category_id'=>6,'filename'=>'soldier','path'=>'career/soldier.jpg','mime'=>'jpeg','size'=>355139,'personality_type_id'=> 1],
            ['type_id'=>1,'category_id'=>6,'filename'=>'teacher','path'=>'career/teacher.jpg','mime'=>'jpeg','size'=>400101,'personality_type_id'=> 4],
            ['type_id'=>1,'category_id'=>6,'filename'=>'writer','path'=>'career/writer.jpg','mime'=>'jpeg','size'=>3272251,'personality_type_id'=> 3],
        ];

        foreach($careers as $career)
        {
            File::create($career);
        }
    }
}
