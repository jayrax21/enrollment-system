<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];
    
    public function schedules()
    {
        return $this->belongsTo(Schedule::class,'schedule_id');
    }
}
