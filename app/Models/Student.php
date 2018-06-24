<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'full_name',
        'birthday',
        'gender',
        'identity',
        'phone',
        'religion',
        'nation',
        'email',
        'home_town',
        'avatar',
    ];
    
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id')->withTimestamps();
    }

    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function risident()
    {
        return $this->hasOne(Risident::class);
    }

    public function oppidans()
    {
        return $this->hasMany(Oppidan::class);
    }

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }

    public function identity()
    {
        return $this->hasOne(Identity::class);
    }

    public function family()
    {
        return $this->hasOne(Family::class);
    }
}
