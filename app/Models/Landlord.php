<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    protected $fillable = [
		'full_name',
		'phone',
		'oppidan_id',
	];

    public function oppidan()
	{
		return $this->belongsTo(Oppidan::class);
	}
}
