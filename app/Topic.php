<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function boxes()
    {
        return $this->hasMany(Box::class);
    }

    public function cheeses()
    {
        return $this->hasMany(Cheese::class);
    }
}
