<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoxesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {



        DB::table('boxes')->insert(array (
            0 =>
            array (
                'id' => 1,
                'box' => '0',
                'type' => 'center',
                'topic_id' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'box' => 'A:1',
                'type' => 'topic',
                'topic_id' => 1,
            ),
            2 =>
            array (
                'id' => 3,
                'box' => 'A:2',
                'type' => 'topic',
                'topic_id' => 3,
            ),
            3 =>
            array (
                'id' => 4,
                'box' => 'A:3',
                'type' => 'topic',
                'topic_id' => 2,
            ),
            4 =>
            array (
                'id' => 5,
                'box' => 'A:4',
                'type' => 'topic',
                'topic_id' => 4,
            ),
            5 =>
            array (
                'id' => 6,
                'box' => 'A:5',
                'type' => 'topic',
                'topic_id' => 5,
            ),
            6 =>
            array (
                'id' => 7,
                'box' => 'A:6',
                'type' => 'cheese',
                'topic_id' => 6,
            ),
            7 =>
            array (
                'id' => 8,
                'box' => 'A:7',
                'type' => 'topic',
                'topic_id' => 5,
            ),
            8 =>
            array (
                'id' => 9,
                'box' => 'A:8',
                'type' => 'dice',
                'topic_id' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'box' => 'A:9',
                'type' => 'topic',
                'topic_id' => 4,
            ),
            10 =>
            array (
                'id' => 11,
                'box' => 'A:10',
                'type' => 'topic',
                'topic_id' => 3,
            ),
            11 =>
            array (
                'id' => 12,
                'box' => 'A:11',
                'type' => 'dice',
                'topic_id' => NULL,
            ),
            12 =>
            array (
                'id' => 13,
                'box' => 'A:12',
                'type' => 'topic',
                'topic_id' => 2,
            ),
            13 =>
            array (
                'id' => 14,
                'box' => 'B:1',
                'type' => 'topic',
                'topic_id' => 4,
            ),
            14 =>
            array (
                'id' => 15,
                'box' => 'B:2',
                'type' => 'topic',
                'topic_id' => 6,
            ),
            15 =>
            array (
                'id' => 16,
                'box' => 'B:3',
                'type' => 'topic',
                'topic_id' => 3,
            ),
            16 =>
            array (
                'id' => 17,
                'box' => 'B:4',
                'type' => 'topic',
                'topic_id' => 5,
            ),
            17 =>
            array (
                'id' => 18,
                'box' => 'B:5',
                'type' => 'topic',
                'topic_id' => 2,
            ),
            18 =>
            array (
                'id' => 19,
                'box' => 'B:6',
                'type' => 'cheese',
                'topic_id' => 1,
            ),
            19 =>
            array (
                'id' => 20,
                'box' => 'B:7',
                'type' => 'topic',
                'topic_id' => 2,
            ),
            20 =>
            array (
                'id' => 21,
                'box' => 'B:8',
                'type' => 'dice',
                'topic_id' => NULL,
            ),
            21 =>
            array (
                'id' => 22,
                'box' => 'B:9',
                'type' => 'topic',
                'topic_id' => 5,
            ),
            22 =>
            array (
                'id' => 23,
                'box' => 'B:10',
                'type' => 'topic',
                'topic_id' => 6,
            ),
            23 =>
            array (
                'id' => 24,
                'box' => 'B:11',
                'type' => 'dice',
                'topic_id' => NULL,
            ),
            24 =>
            array (
                'id' => 25,
                'box' => 'B:12',
                'type' => 'topic',
                'topic_id' => 3,
            ),
            25 =>
            array (
                'id' => 26,
                'box' => 'C:1',
                'type' => 'topic',
                'topic_id' => 5,
            ),
            26 =>
            array (
                'id' => 27,
                'box' => 'C:2',
                'type' => 'topic',
                'topic_id' => 1,
            ),
            27 =>
            array (
                'id' => 28,
                'box' => 'C:3',
                'type' => 'topic',
                'topic_id' => 6,
            ),
            28 =>
            array (
                'id' => 29,
                'box' => 'C:4',
                'type' => 'topic',
                'topic_id' => 2,
            ),
            29 =>
            array (
                'id' => 30,
                'box' => 'C:5',
                'type' => 'topic',
                'topic_id' => 3,
            ),
            30 =>
            array (
                'id' => 31,
                'box' => 'C:6',
                'type' => 'cheese',
                'topic_id' => 4,
            ),
            31 =>
            array (
                'id' => 32,
                'box' => 'C:7',
                'type' => 'topic',
                'topic_id' => 3,
            ),
            32 =>
            array (
                'id' => 33,
                'box' => 'C:8',
                'type' => 'dice',
                'topic_id' => NULL,
            ),
            33 =>
            array (
                'id' => 34,
                'box' => 'C:9',
                'type' => 'topic',
                'topic_id' => 2,
            ),
            34 =>
            array (
                'id' => 35,
                'box' => 'C:10',
                'type' => 'topic',
                'topic_id' => 1,
            ),
            35 =>
            array (
                'id' => 36,
                'box' => 'C:11',
                'type' => 'dice',
                'topic_id' => NULL,
            ),
            36 =>
            array (
                'id' => 37,
                'box' => 'C:12',
                'type' => 'topic',
                'topic_id' => 6,
            ),
            37 =>
            array (
                'id' => 38,
                'box' => 'D:1',
                'type' => 'topic',
                'topic_id' => 2,
            ),
            38 =>
            array (
                'id' => 39,
                'box' => 'D:2',
                'type' => 'topic',
                'topic_id' => 4,
            ),
            39 =>
            array (
                'id' => 40,
                'box' => 'D:3',
                'type' => 'topic',
                'topic_id' => 1,
            ),
            40 =>
            array (
                'id' => 41,
                'box' => 'D:4',
                'type' => 'topic',
                'topic_id' => 3,
            ),
            41 =>
            array (
                'id' => 42,
                'box' => 'D:5',
                'type' => 'topic',
                'topic_id' => 6,
            ),
            42 =>
            array (
                'id' => 43,
                'box' => 'D:6',
                'type' => 'cheese',
                'topic_id' => 5,
            ),
            43 =>
            array (
                'id' => 44,
                'box' => 'D:7',
                'type' => 'topic',
                'topic_id' => 6,
            ),
            44 =>
            array (
                'id' => 45,
                'box' => 'D:8',
                'type' => 'dice',
                'topic_id' => NULL,
            ),
            45 =>
            array (
                'id' => 46,
                'box' => 'D:9',
                'type' => 'topic',
                'topic_id' => 3,
            ),
            46 =>
            array (
                'id' => 47,
                'box' => 'D:10',
                'type' => 'topic',
                'topic_id' => 4,
            ),
            47 =>
            array (
                'id' => 48,
                'box' => 'D:11',
                'type' => 'dice',
                'topic_id' => NULL,
            ),
            48 =>
            array (
                'id' => 49,
                'box' => 'D:12',
                'type' => 'topic',
                'topic_id' => 1,
            ),
            49 =>
            array (
                'id' => 50,
                'box' => 'E:1',
                'type' => 'topic',
                'topic_id' => 3,
            ),
            50 =>
            array (
                'id' => 51,
                'box' => 'E:2',
                'type' => 'topic',
                'topic_id' => 5,
            ),
            51 =>
            array (
                'id' => 52,
                'box' => 'E:3',
                'type' => 'topic',
                'topic_id' => 4,
            ),
            52 =>
            array (
                'id' => 53,
                'box' => 'E:4',
                'type' => 'topic',
                'topic_id' => 6,
            ),
            53 =>
            array (
                'id' => 54,
                'box' => 'E:5',
                'type' => 'topic',
                'topic_id' => 1,
            ),
            54 =>
            array (
                'id' => 55,
                'box' => 'E:6',
                'type' => 'cheese',
                'topic_id' => 2,
            ),
            55 =>
            array (
                'id' => 56,
                'box' => 'E:7',
                'type' => 'topic',
                'topic_id' => 1,
            ),
            56 =>
            array (
                'id' => 57,
                'box' => 'E:8',
                'type' => 'dice',
                'topic_id' => NULL,
            ),
            57 =>
            array (
                'id' => 58,
                'box' => 'E:9',
                'type' => 'topic',
                'topic_id' => 6,
            ),
            58 =>
            array (
                'id' => 59,
                'box' => 'E:10',
                'type' => 'topic',
                'topic_id' => 5,
            ),
            59 =>
            array (
                'id' => 60,
                'box' => 'E:11',
                'type' => 'dice',
                'topic_id' => NULL,
            ),
            60 =>
            array (
                'id' => 61,
                'box' => 'E:12',
                'type' => 'topic',
                'topic_id' => 4,
            ),
            61 =>
            array (
                'id' => 62,
                'box' => 'F:1',
                'type' => 'topic',
                'topic_id' => 6,
            ),
            62 =>
            array (
                'id' => 63,
                'box' => 'F:2',
                'type' => 'topic',
                'topic_id' => 2,
            ),
            63 =>
            array (
                'id' => 64,
                'box' => 'F:3',
                'type' => 'topic',
                'topic_id' => 5,
            ),
            64 =>
            array (
                'id' => 65,
                'box' => 'F:4',
                'type' => 'topic',
                'topic_id' => 1,
            ),
            65 =>
            array (
                'id' => 66,
                'box' => 'F:5',
                'type' => 'topic',
                'topic_id' => 4,
            ),
            66 =>
            array (
                'id' => 67,
                'box' => 'F:6',
                'type' => 'cheese',
                'topic_id' => 3,
            ),
            67 =>
            array (
                'id' => 68,
                'box' => 'F:7',
                'type' => 'topic',
                'topic_id' => 4,
            ),
            68 =>
            array (
                'id' => 69,
                'box' => 'F:8',
                'type' => 'dice',
                'topic_id' => NULL,
            ),
            69 =>
            array (
                'id' => 70,
                'box' => 'F:9',
                'type' => 'topic',
                'topic_id' => 1,
            ),
            70 =>
            array (
                'id' => 71,
                'box' => 'F:10',
                'type' => 'topic',
                'topic_id' => 2,
            ),
            71 =>
            array (
                'id' => 72,
                'box' => 'F:11',
                'type' => 'dice',
                'topic_id' => NULL,
            ),
            72 =>
            array (
                'id' => 73,
                'box' => 'F:12',
                'type' => 'topic',
                'topic_id' => 5,
            ),
        ));


    }
}
