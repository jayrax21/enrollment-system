<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
    protected $fillable=['enroll_id'];

    public function enrolls()
    {
        return $this->belongsTo(Enrollee::class,'enroll_id');
    }
}
