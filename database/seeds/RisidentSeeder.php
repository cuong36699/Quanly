<?php

use Illuminate\Database\Seeder;
use App\Models\Risident;
use App\Models\Student;

class RisidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Risident::truncate();

        Student::all()->each(function ($student)
        {
        	$student->risident()->save(factory(Risident::class)->make());
        });
    }
}
