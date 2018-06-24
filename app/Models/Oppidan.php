<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oppidan extends Model
{
	protected $fillable = [
		'address',
		'street',
		'city',
		'student_id',
	];

	public function student()
	{
		return $this->belongsTo(Student::class);
	}
	public function landlord()
	{
		return $this->hasOne(Landlord::class);
	}
}
