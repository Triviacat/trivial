<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function turn()
    {
        return $this->belongsTo(Turn::class);
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

    public function cheeses()
    {
        return $this->hasMany(Cheese::class);
    }

    public function turns()
    {
        return $this->hasMany(Turn::class);
    }

    public function users()
    {
        $users = array();
        foreach ($this->players as $player) {
            $user = User::find($player);
            $cheeses = DB::table('cheeses')
                ->join('topics', 'cheeses.topic_id', '=', 'topics.id')
                ->where('cheeses.game_id', '=', $this->id)
                ->where('cheeses.user_id', '=', $player)
                ->get();
            $box = DB::table('turns')
                ->join('boxes', 'turns.box_id', '=', 'boxes.id')
                ->where('turns.user_id', '=', $player)
                ->where('turns.game_id', '=', $this->id)
                ->select('boxes.id', 'boxes.box')
                ->latest()
                ->first();
            if (!isset($box)) { // at the beginnig if the game, not everybody has an assigned box.
                $box['box'] = '0';
            }
            $users[] = array(
                'user' => $user,
                'cheeses' => $cheeses,
                'box' => $box,
            );
        }

        return $users;
    }

    public function slots()
    {
        return $this->belongsToMany(Slot::class);
    }
}
