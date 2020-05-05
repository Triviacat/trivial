<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateEstateFromGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->string('status', 10)->default('new');
        });

        $games = DB::table('games')->select('id', 'estate')->get();
        foreach ($games as $game) {
            switch ($game->estate) {
                case 0: $status = 'closed'; break;
                case 1: $status = 'open'; break;
                case 2: $status = 'started'; break;
                case 3: $status = 'closed'; break;
                case 4: $status = 'over'; break;
            }
            DB::table('games')->where('id', $game->id)->update(['status' => $status]);
        }

        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('estate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            //
        });
    }
}
