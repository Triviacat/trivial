<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    /**
     * Import csv fil of question
     *
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function import()
    {
        $response = Http::get('https://preguntes.triviacat.site/export/preguntes');
        Storage::put('/public/questions.csv', $response->body());
        $file = Storage::get('/public/questions.csv');
        $array = array_map("str_getcsv", explode("\n", $file));
        array_shift($array);
        $questions = $array;
        foreach ($questions as $q) {
            if (isset($q[1])) {
                Question::updateOrCreate(
                    ['nid' => $q[0]],
                    ['title' => $q[1],
                    'text' => $q[2],
                    'answer' => $q[3],
                    'topic_id' => (int)$q[4],
                     'set_id' => (int)$q[5]]
                );
            }
        }
        return redirect()->back();
    }
}
