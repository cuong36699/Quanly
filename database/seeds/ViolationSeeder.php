<?php

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Violation;

class ViolationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Violation::truncate();

        Student::all()->each(function ($student)
        {
        	$student->violations()->saveMany(factory(Violation::class, 2)->make());
        });
    }
}
