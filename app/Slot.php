<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

}
