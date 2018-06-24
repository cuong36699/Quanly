<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
		'union_member',
		'date_union_member',
		'adherer_member',
		'date_adherer_member',
		'student_id',
	];

    public function student()
	{
		return $this->belongsTo(Student::class);
	}
}
