<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $guarded = [];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function turns()
    {
        return $this->hasMany(Turn::class);
    }

    public function slots()
    {
        return $this->hasMany(Slot::class);
    }

    // public function box_id($box_name)
    // {
    //     return Box::where('box', '=', $box_name)->value('id');
    // }
}
