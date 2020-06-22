<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = [];

    public function schedules()
    {
        return $this->belongsTo(Schedule::class,'schedule_id');
    }
    public function teachers()
    {
        return $this->belongsTo(Teacher::class,"teacher_id");
    }
    public function rooms()
    {
        return $this->belongsTo(Room::class,"room_id");
    }
}
