<?php

use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\Student;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::truncate();

        Student::all()->each(function ($student)
        {
        	$student->member()->save(factory(Member::class)->make());
        });
    }
}
