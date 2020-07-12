<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decline extends Model
{
    protected $fillable=['enroll_id','remarks'];

    public function enrolls()
    {
        return $this->belongsTo(Enrollee::class,'enroll_id');
    }
}
