<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";

    protected $guarded = [];


    public function getSubjects(){
    	return $this->hasMany('App\StudentSubjects', 'student_id', 'id');
    }

    public function scopeFilter($query, $filter = []) {
		if(!empty($filter['keyword'])){
            // trim keywords
            $keyword = trim($filter['keyword']);

            // Search student data
            // Subquery to connect subjects
			$query->where(function($q) use ($keyword){
                $q->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('contact_number', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%')
                ->orWhere('address', 'like', '%' . $keyword . '%');
            });
		}


        if(!empty($filter['subjects'])){

			$query->whereHas('getSubjects', function($q) use ($filter){
				$q->whereIn('subject_id', $filter['subjects']);
			});
		}

        return $query;
    }

}
