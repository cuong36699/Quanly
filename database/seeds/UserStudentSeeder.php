<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;

class UserStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
    	Student::truncate();

    	factory(Student::class, 5)->create()->each(function ($student_id)
    	{
    		$student_id->user()->save(factory(User::class)->make());
    	});
    }
}
