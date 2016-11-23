<?php

use Illuminate\Database\Seeder;
use App\Models\PersonalityType;

class PersonalityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            ['type'=>'Realistic','description'=>'The Do-ers. People who enjoy practical, hands-on problems and solutions. May have athletic or mechanical ability. Prefer to work with objects, machines, tools, plants, and/or animals. May prefer to work outdoors. They like to accomplish tasks. They are dependable, punctual, detailed, hard-working, and reliable individuals. Possible careers include mechanic, chef, engineer, police officer, athlete, pilot, soldier, and firefighter.'],
            ['type'=>'Investigative','description'=>'The Thinkers. People who enjoy work activities that have todo with ideas and thinking more than physical activity. They like to observe, learn, investigate, analyze, evaluate, problem-solve. They are scientific and lab-oriented, and are fascinated by how things work. They tend to have logical and mathematical abilities. They are complex, curious, research-oriented, cool, calm and collected individuals. Possible careers include architect, computer scientist, psychologist, doctor, and pharmacist.'],
            ['type'=>'Artistic','description'=>'The Creators. People who have artistic, innovative, intuitional ability and like to work in unstructured situations using imagination and creativity. They like self-expression in their work. Possible careers include musician, artist, interior designer, graphic designer, actor, writer, and lawyer.'],
            ['type'=>'Social','description'=>'The Helpers. people who like to work with others by informing, helping, training, teaching, developing, or curing them. Often are skilled with words. They enjoy healing others and have a lot of empathy for the feelings of others. Possible carrers include social worker, counselor, occupational therapist, teacher, nurse, librarian, and dental hygienist.'],
            ['type'=>'Enterprising','description'=>'The Persuaders. People who enjoy work activities that have to do with starting up and carrying out projects, especially business ventures. They like influencing, persuading, and leading people and making decisions. They may be easily bored and grow restless with routine. They prefer to work in their own unique style and like to take risks. Possible careers include business owner, lawyer, school administrator, sales person, real estate agent, judge, and public relations specialist.'],
            ['type'=>'Conventional','description'=>'The Organizers. People who like to work with data, have clerical and/or numerical ability, and who enjoy work activites that follow set procedures and routines. Conventional types are people who are good at coordinating people, places, or events. Possible careers include accountant, secretary, bank teller, dental assistant, and math teacher.'],
        ];

        foreach($subjects as $subject)
        {
            PersonalityType::create($subject);
        }
    }
}
