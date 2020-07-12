<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollee extends Model
{
    protected $fillable = ['student_id','subject_id'];

    public function subjects()
    {
        return $this->hasMany(Subject::class,'subject_id');
    }
}
