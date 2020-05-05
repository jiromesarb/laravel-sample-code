<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSubjects extends Model
{
    protected $table = 'student_subjects';

    protected $guarded = [];


    public function subject(){
    	return $this->hasOne('App\Subject', 'id', 'subject_id');
    }
}
