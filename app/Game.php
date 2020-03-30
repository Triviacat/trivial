<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'players' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        switch ($this->estate) {
            case 0: return 'Closed'; break;
            case 1: return 'Opened'; break;
            case 2: return 'Started'; break;
            case 3: return 'Stoped'; break;
            case 4: return 'Ended'; break;
        }

    }
}
