<?php

namespace App\Http\Controllers;

use App\Box;
use App\Cheese;
use App\Events\EnableBoxButton;
use App\Events\EnableDiceButton;
use App\Events\NotifyGameOver;
use App\Events\NotifyGameUpdate;
use App\Events\NotifyMessage;
use App\Events\NotifyNewBoard;
use App\Events\NotifyNewTurn;
use App\Events\NotifyWhosTurn;
use App\Events\ShowBoxResult;
use App\Events\ShowDiceResult;
use App\Events\ShowQuestion;
use App\Game;
use App\Slot;
use App\Turn;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurnController extends Controller
{
    /**
     * start a new turn
     *
     * @param  \App\Game  $game
     * @param  String  $type
     * @return \Illuminate\Http\Response
     */
    public static function new(Game $game, $type = 'dice')
    {

        # take the first user as turn's user
        $turn_uid = $game->players[0];

        // array_push($rplayers, $turn_uid);
        # add the first turn to db
        $turn = new Turn;
        $turn->game_id = $game->id;
        $turn->user_id = $turn_uid;
        $turn->step = $type;
        $turn->box_id = TurnController::userBox($game->id, $turn_uid);
        $turn->save();

        $game->turn_id = $turn->id;
        $game->update();


        # notify who's turn
        NotifyWhosTurn::dispatch($turn);

        # empty message bar
        NotifyMessage::dispatch($game, '');

        # enable dice button to turn's user
        EnableDiceButton::dispatch($turn);
    }

    /**
     * stores roll dice
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function roll(Turn $turn, Request $request)
    {
        // Game::findOrFail($id)->delete();
        // return redirect('/games');

        # save dice result top turn ddbb
        $attributes = $request->validate([
            'dice' => ['required', 'max:1'],
        ]);
        $turn->step = "box";
        $turn->update($attributes);

        # dispatch result
        ShowDiceResult::dispatch($turn);

        # enable box button
        EnableBoxButton::dispatch($turn);

        return $turn;
    }

    /**
     * stores box mouvement and show question
     *
     * @param  \App\Turn  $turn
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function box(Turn $turn, Request $request)
    {
        // return($turn);
        $attributes = $request->validate([
            'box' => ['required'],
            'topic' => ['sometimes'],
            'finish' => ['sometimes']
        ]);

        # convert box_name (what we receive here) to box_id
        $box = Box::where('box', '=', $attributes['box'])->get();

        # save dice result top turn ddbb
        $turn->box_id = $box[0]->id;
        // return $box[0]->type;

        # junction to a dice again, topic or cheese or final box
        if ($box[0]->type == 'dice') { // roll again
            # save data to this turn
            $turn->step = "dice";
            $turn->update();
            # save board position
            TurnController::slot($turn);
            # dispatch board's slots
            TurnController::slots($turn);
            # and start a new turn
            $turn_uid = $turn->user_id;
            $game_id = $turn->game_id;

            $turn = new Turn;
            $turn->game_id = $game_id;
            $turn->user_id = $turn_uid;
            $turn->step = "dice";
            $turn->box_id = TurnController::userBox($game_id, $turn_uid);
            $turn->save();

            # update game record with new turn in place
            $game = Game::find($game_id);
            $game->turn_id = $turn->id;
            $game->update();

            # stores and dispatch board's slot
            TurnController::slots($turn);
            # enable dice button to turn's user
            EnableDiceButton::dispatch($turn);
            # dispatch new turn to vue
            NotifyNewTurn::dispatch($turn);
            # notify new game data (cheeses and boxes for each player)
            NotifyGameUpdate::dispatch($game);
            return $turn;
        } elseif ($box[0]->type == 'topic' || $box[0]->type == 'cheese') { // ask a question to the turn's player
            $turn->step = "question";
            $turn->update();

            # save board position
            TurnController::slot($turn);
            # dispatch board's slots
            TurnController::slots($turn);

            # dispatch result
            ShowBoxResult::dispatch($turn);
            # notify new game data
            $game = Game::find($turn->game_id);
            NotifyGameUpdate::dispatch($game);

            # show question to reader
            TurnController::sendQuestion($turn);

            return $turn;
        } elseif ($box[0]->type == 'center') { // player is at center box
            if ($request['finish']) { // player has all cheeses and may finish the game
                // return $request['finish'];

                $turn->step = "final";
                $answers = $turn->answers;
                // return $answers;
                if (!$answers) { //first time in this turn the players tries to answer all the questions
                    $topic_id = 1;
                    $answers = array(
                        1 => array(),
                        2 => array(),
                        3 => array(),
                        4 => array(),
                        5 => array(),
                        6 => array(),
                    );
                    $turn->answers = $answers;
                    $turn->update();
                    # save board position
                    TurnController::slot($turn);
                    # dispatch board's slots
                    TurnController::slots($turn);
                }
                else {
                    // player arrived here because an box undo action and $answers is actually set
                    // it should'nt happen and it has not sense, so we disabled the udo button when this
                    // situation occurs


                }

                # notify players of chance to win
                $game = Game::find($turn->game_id);
                $message = 'Juga per guanyar la partida!!';
                // return $message;
                NotifyMessage::dispatch($game, $message);
                # save board position
                TurnController::slot($turn);
                # dispatch board's slots
                TurnController::slots($turn);
                # show question to reader
                TurnController::sendFinalQuestion($turn, $topic_id);
                return $turn;

            } else { // user doesn't have all cheeses
                // return $request['topic'];
                $turn->step = "question";
                $turn->update();

                # dispatch result
                ShowBoxResult::dispatch($turn);
                # stores and dispatch board's slot
                TurnController::slots($turn);
                # notify new game data
                $game = Game::find($turn->game_id);
                NotifyGameUpdate::dispatch($game);

                # show question to reader
                TurnController::sendQuestion($turn, $request['topic']);

                return $turn;
            }
        }
    }

    /**
     * undo box movement
     *
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    // public function boxUndo(Turn $turn)
    // {
    //     $turn->step = 'box';
    //     $turn->question_id = null;
    //     $turn->update();


    //     # dispatch undo action
    //     NotifyUndoBox::dispatch($turn);


    //     return $turn;
    // }

    /**
     * stores question answer
     *
     * @param  \App\Turn  $turn
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function question(Turn $turn, Request $request)
    {
        # player is answering the final questions to win (or not) the game
        if ($turn->step == 'final') {
            // return $turn;
            $answers = $turn->answers;
            foreach ($answers as $key => $answer) {
                if (isset($answer['question_id']) && $answer['question_id'] == $turn->question_id) {
                    $answers[$key]['answer'] = $request['answer'];
                }
            }
            $turn->answers = $answers;
            $turn->update();

            $oks = array();
            $kos = array();
            // find out next topic to ask
            foreach ($answers as $key => $answer) {
                //
                if (isset($answer['answer']) && $answer['answer'] == 'ok') {
                    $oks[] = $answer['question_id'];
                }
                if (isset($answer['answer']) && $answer['answer'] == 'ko') {
                    $kos[] = $answer['question_id'];
                }
                if (count($kos) == 3) {
                    // player lost the chance. game continues
                    $turn->answer = false;
                    $turn->step = 'done';
                    $turn->update();

                    # move user of this turn to last place in the players array in $game
                    $game = Game::find($turn->game_id);
                    $players = $game->players;
                    $player = array_shift($players);
                    array_push($players, $player);
                    $game->players = $players;
                    $game->update();

                    # notify game update
                    NotifyGameUpdate::dispatch($game);

                    # start new turn
                    TurnController::new($game);
                    die;

                }
                if (count($oks) == 4) {
                    // player won
                    $game = Game::find($turn->game_id);
                    $game->estate = 4; // ended
                    $game->update();
                    NotifyGameOver::dispatch($game);
                    die;
                }
                // find out next topic to ask
                if (empty($answer)) {
                    $topic_id = $key;
                break;
                }
            }

            // send a new request for a question
            TurnController::sendFinalQuestion($turn, $topic_id);

            return $turn;
        }
        // other wise keep with the normal procedure

        # register turn (answer & step)
        if ($request->answer == 'ok') {
            $turn->answer = true;
            $turn->step = 'done';
            $turn->update();
            // return $turn->box->type;
            # save cheese if box is a cheese one and the answer is right
            if ($turn->box->type == 'cheese') {
                $cheese_exists = DB::table('cheeses')
                    ->where('cheeses.game_id', '=', $turn->game_id)
                    ->where('cheeses.user_id', '=', $turn->user_id)
                    ->where('cheeses.topic_id', '=', $turn->box->topic_id)
                    ->get();
                if (!isset($cheese_exists[0]->game_id)) { // unless user already has this cheese
                    $cheese = new Cheese;
                    $cheese->game_id = $turn->game_id;
                    $cheese->user_id = $turn->user_id;
                    $cheese->topic_id = $turn->box->topic_id;
                    $cheese->save();
                }
            }
            $game = Game::find($turn->game_id);
        } elseif ($request->answer == 'ko') {
            $turn->answer = false;
            $turn->step = 'done';
            $turn->update();

            # move user of this turn to last place in the players array in $game
            $game = Game::find($turn->game_id);
            $players = $game->players;
            $player = array_shift($players);
            array_push($players, $player);
            $game->players = $players;
            $game->update();
        }

        # notify game update
        NotifyGameUpdate::dispatch($game);

        # start new turn
        TurnController::new($game);
    }

    /**
     * Determine actual box position of a given user.
     *
     * @param  int  $game->id
     * @param  int  $user->id
     * @return int $box_id
     */
    static function userBox($game_id, $user_id)
    {
        $box_id = DB::table('turns')
            ->where('game_id', '=', $game_id)
            ->where('user_id', '=', $user_id)
            ->latest()
            ->value('box_id');

        if (isset($box_id)) {
            return $box_id;
        } else {
            return 1;
        }
    }

    /**
     * Return a random question of a given topic excluding the ones
     * already appeared in a given game
     *
     *
     * @param Int $topic_id
     * @param Int $game_id
     * @return Object $question
     **/
    public function questionToAsk($topic_id, $game_id)
    {
        ## get used questions to exclude them from the question choosed later
        $uq = DB::table('turns')
            ->where('game_id', '=', $game_id)
            ->where('question_id', '!=', null)
            ->select('question_id')
            ->get();
        $usedQuestions = array();
        foreach ($uq as $value) {
            $usedQuestions[] = $value->question_id;
        }
        // return $usedQuestions;
        # get a question
        $question = DB::table('questions')
            ->join('topics', 'questions.topic_id', '=', 'topics.id')
            ->select('questions.*', 'topics.title as topic_title')
            ->where('questions.topic_id', '=', $topic_id)
            ->whereNotIn('questions.id', $usedQuestions)
            ->inRandomOrder()
            ->first();

        return $question;
    }

    /**
     * Show a question to a random reader for a given turn
     * and optional topic_id (when player is at box 0 where he can choose
     * the topic)
     *
     * @param \App\Turn $turn
     * @param Int $topic_id
     **/
    public function sendQuestion(Turn $turn, $topic_id = null)
    {
        # select a random user
        $players = $turn->game->players; //all players of the game
        $players = array_diff($players, array($turn->user_id)); //without the user of the actual turn
        shuffle($players);
        $rid = $players[0];
        $reader = User::find($rid);

        if (!$topic_id) {
            $topic_id = $turn->box->topic_id;
        }
        $question = TurnController::questionToAsk($topic_id, $turn->game_id);

        $turn->reader_id = $reader->id;
        $turn->question_id = $question->id;
        $turn->update();
        # dispatch question to reader
        ShowQuestion::dispatch($reader, $question);
    }

    /**
     * Show a question to a random reader for a final turn
     * (player is at box 0 and tries to answer 4 of 6 questions,
     * one of each topic)
     *
     * @param \App\Turn $turn
     * @param Int $topic_id
     **/
    public function sendFinalQuestion(Turn $turn, $topic_id)
    {
        # select a random user
        $players = $turn->game->players; //all players of the game
        $players = array_diff($players, array($turn->user_id)); //without the user of the actual turn
        shuffle($players);
        $rid = $players[0];
        $reader = User::find($rid);

        if (!$topic_id) {
            $topic_id = $turn->box->topic_id;
        }
        $question = TurnController::questionToAsk($topic_id, $turn->game_id);

        $turn->reader_id = $reader->id;
        $answers = $turn->answers;
        $answers[$topic_id]['question_id'] = $question->id;
        $turn->answers = $answers;
        $turn->question_id = $question->id;
        $turn->update();
        # dispatch question to reader
        ShowQuestion::dispatch($reader, $question);
    }

    /**
     * return the box options given an initial box and a given dice
     *
     *
     * @param Illuminate\http\request $request
     **/
    public function options(Request $request)
    {
        // TODO: validate request
        // return $request['dice'];
        if ($request['dice'] != 'null') {

            $options = array();
            $letters = array('a','b','c','d','e','f');
            $d = (int)$request['dice'];
            $box = $request['box'];
            // return $box;
            if ($box == '0') { // box is 0
                for ($l='a'; $l < 'g'; $l++) {
                    $options[] = $l . ":" . ($d + $box);
                }
            }
            else {
                $box = explode(":", $box);

                $l = strtolower($box[0]);
                // return $l;
                $n = (int)$box[1];

                if ($n < 7) {  // box is within the radius 1-6
                    if (($n + $d) < 13) { // anticlockwise sum going outward
                        $options[] = $l . ":" . ($n + $d);
                        if (($n + $d) > 6) { // clockwise sum going outward
                            //number first
                            $dif = 6 -$n -$d;
                            $nn = 13 + $dif;
                            // letters (shame php doesn't decrement letters)
                            switch ($l) {
                                case 'a': $nl = 'f'; break;
                                case 'b': $nl = 'a'; break;
                                case 'c': $nl = 'b'; break;
                                case 'd': $nl = 'c'; break;
                                case 'e': $nl = 'd'; break;
                                case 'f': $nl = 'e'; break;
                            }
                            $options[] = $nl . ":" . ($nn);
                        }
                    }
                    // inward
                    $nn = $n - $d;
                    if ($nn == 0) {
                        $options[] = '0';
                    }
                    else {
                        if ($n < $d) {
                            $nn = abs($d - $n);
                            foreach (array_diff($letters, array($l)) as $value) {
                                $options[] = $value . ":" . $nn;
                            }
                        }
                        else {
                            $options[] = $l . ":" . ($n - $d);
                        }

                    }
                }
                else { //box is in the outer circle 7-12
                    //anticlockwise
                    if (($d + $n) < 13) {
                        $options[] = $l . ":" . ($n + $d);
                    }
                    else { // anticloclkwise inwards
                        if ($l == 'f') {
                            $nl = 'a';
                        }
                        else {
                            $nl = ++$l;
                        }
                        $options[] = $nl . ":" . (6 + 13 -$n -$d);
                        if (($d + $n) > 13) {
                            $options[] = $nl . ":" . ($d +$n -7);
                        }

                    }
                    $l = strtolower($box[0]);
                    // clockwise inwards
                    // return $l;
                    $options[] = $l . ":" . ($n - $d);
                    // clockwise outwards
                    if (($n - $d) < 6) {
                        $dif = 6 - $n + $d;
                        $nn = 13 - abs($dif);
                        // letters (shame php doesn't decrement letters)
                        switch ($l) {
                            case 'a': $nl = 'f'; break;
                            case 'b': $nl = 'a'; break;
                            case 'c': $nl = 'b'; break;
                            case 'd': $nl = 'c'; break;
                            case 'e': $nl = 'd'; break;
                            case 'f': $nl = 'e'; break;
                        }
                        $options[] = $nl . ":" . ($nn);
                    }
                }
            }

            return $options;
        }
        else {
            return null;
        }

    }

    /**
     * Return all slots of a game to print them
     * on the board
     *
     *
     * @param App\Turn $turn
     **/
    public static function slots(Turn $turn)
    {

        $slots = DB::table('game_slot')
            ->join('slots', 'game_slot.slot_id', '=', 'slots.id')
            ->join('users', 'game_slot.user_id', '=', 'users.id')
            ->where('game_id', '=', $turn->game_id)
            ->select('slots.x', 'slots.y', 'users.color')
            ->get();

        # dispatch board positions
        NotifyNewBoard::dispatch($turn, $slots);

        return $slots;
    }


    /**
     * stores the board slot for a given turn
     *
     * @param App\Turn $turn
     **/
    public static function slot(Turn $turn)
    {


        // delete the previous slot for the given turn's user
        DB::table('game_slot')->where('user_id', '=', $turn->user_id)
            ->where('game_id', '=', $turn->game_id)
            ->delete();

        // find a new free slot for new mouvement


        // return $turn;
        $slots = DB::table('game_slot')
            ->join('slots', 'game_slot.slot_id', '=', 'slots.id')
            ->where('game_id', '=' , $turn->game_id)
            ->where('slots.box_id', '=', $turn->box_id)
            ->select('slots.id')
            ->get();
            $used_slots = array();
            foreach ($slots as $slot) {
                $used_slots[] = $slot->id;
            }

        // all possible slots for a given $turn->box: $turn->box->slots
        $all_slots = array();
        foreach ($turn->box->slots as $slot) {
            $all_slots[] = $slot->id;
        }

        // free slots for the given box
        $free_slots = array_diff($all_slots, $used_slots);

        // save the assigned slot into the ddbb for the given turn's user
        $slot = array_shift($free_slots);
        // return $slot;
        $slot = Slot::find($slot);
        DB::table('game_slot')->insert([
            'game_id' => $turn->game_id,
            'slot_id' => $slot->id,
            'user_id' => $turn->user_id,
        ]);
    }

    /**
     * stores the initial slot for a given user and game
     *
     * @param Int $user_id
     * @param Int $game_id
     **/
    public static function initialSlot($user_id, $game_id)
    {
        $turn = new Turn;
        $turn->game_id = $game_id;
        $turn->user_id = $user_id;
        $turn->box_id = 1;

        TurnController::slot($turn);
        TurnController::slots($turn);
    }

}
