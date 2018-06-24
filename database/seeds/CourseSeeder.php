<?php

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Student;
use App\Models\Department;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Course::truncate();
    	DB::table('course_student')->truncate();

    	Department::all()->each(function ($department)
    	{
    		$department->courses()->saveMany(factory(Course::class, 2)->make());
    	});

    	$lops = Course::all();

    	Student::all()->each(function ($sv) use ($lops)
    	{
    		$sv->courses()->attach(
    			$lops->random(rand(0, 2))->pluck('id')->toArray()
    		);
    	});
    }
}
