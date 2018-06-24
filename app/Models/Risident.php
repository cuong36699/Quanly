<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Risident extends Model
{
	protected $fillable = [
		'address',
		'street',
		'city',
		'postal_code',
		'home_phone',
		'student_id',
	];

	public function student()
	{
		return $this->belongsTo(Student::class);
	}
}
