<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    protected $fillable = [
		'date_violation',
		'form_of_violation',
		'discipline',
		'student_id',
	];

    public function student()
	{
		return $this->belongsTo(Student::class);
	}
}
