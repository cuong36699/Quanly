<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $fillable = [
        'course_name',
        'department_id',
    ];

    public function students()			
	{
		return $this->belongsToMany(Student::class, 'course_student', 'course_id', 'student_id')->withTimestamps();
	}

	public function department()
	{
		return $this->belongsTo(Department::class);
	}
}
