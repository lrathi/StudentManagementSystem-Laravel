<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = 
    [
    	'first_name',
    	'last_name',
    	'email',
    	'phone',
    	'address'
    ];

    public function courses()
    {
        return $this->belongsToMany('App\Course','course_student','student_id','course_id');
    }
}
