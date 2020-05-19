<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id');
            $table->foreignId('question_id')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('box_id')->nullable();
            $table->boolean('answer')->nullable();
            // $table->boolean('answer')->nullable();
            // $table->text('answers')->nullable(); // array()
            $table->string('step', 8)->default('dice'); // steps: dice, box, question, cheese, final, done
            $table->foreignId('reader_id')->nullable();
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('question_id')->references('id')->on('questions');
            // $table->foreign('game_id')->references('id')->on('games');
            // $table->foreign('box_id')->references('id')->on('boxes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turns');
    }
}
