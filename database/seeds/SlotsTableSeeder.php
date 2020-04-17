<?php

use Illuminate\Database\Seeder;

class SlotsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('slots')->delete();
        
        \DB::table('slots')->insert(array (
            0 => 
            array (
                'id' => 1,
                'box_id' => 1,
                'position' => 1,
                'x' => 356,
                'y' => 374,
            ),
            1 => 
            array (
                'id' => 2,
                'box_id' => 1,
                'position' => 2,
                'x' => 390,
                'y' => 356,
            ),
            2 => 
            array (
                'id' => 3,
                'box_id' => 1,
                'position' => 3,
                'x' => 428,
                'y' => 368,
            ),
            3 => 
            array (
                'id' => 4,
                'box_id' => 1,
                'position' => 4,
                'x' => 355,
                'y' => 409,
            ),
            4 => 
            array (
                'id' => 5,
                'box_id' => 1,
                'position' => 5,
                'x' => 388,
                'y' => 422,
            ),
            5 => 
            array (
                'id' => 6,
                'box_id' => 1,
                'position' => 6,
                'x' => 428,
                'y' => 409,
            ),
            6 => 
            array (
                'id' => 10,
                'box_id' => 2,
                'position' => 1,
                'x' => 332,
                'y' => 449,
            ),
            7 => 
            array (
                'id' => 11,
                'box_id' => 2,
                'position' => 2,
                'x' => 373,
                'y' => 472,
            ),
            8 => 
            array (
                'id' => 12,
                'box_id' => 2,
                'position' => 3,
                'x' => 326,
                'y' => 467,
            ),
            9 => 
            array (
                'id' => 13,
                'box_id' => 2,
                'position' => 4,
                'x' => 360,
                'y' => 486,
            ),
            10 => 
            array (
                'id' => 14,
                'box_id' => 3,
                'position' => 1,
                'x' => 311,
                'y' => 490,
            ),
            11 => 
            array (
                'id' => 15,
                'box_id' => 3,
                'position' => 2,
                'x' => 349,
                'y' => 513,
            ),
            12 => 
            array (
                'id' => 16,
                'box_id' => 3,
                'position' => 3,
                'x' => 304,
                'y' => 506,
            ),
            13 => 
            array (
                'id' => 17,
                'box_id' => 3,
                'position' => 4,
                'x' => 342,
                'y' => 526,
            ),
            14 => 
            array (
                'id' => 18,
                'box_id' => 4,
                'position' => 1,
                'x' => 290,
                'y' => 530,
            ),
            15 => 
            array (
                'id' => 19,
                'box_id' => 4,
                'position' => 2,
                'x' => 324,
                'y' => 551,
            ),
            16 => 
            array (
                'id' => 20,
                'box_id' => 4,
                'position' => 3,
                'x' => 286,
                'y' => 548,
            ),
            17 => 
            array (
                'id' => 21,
                'box_id' => 4,
                'position' => 4,
                'x' => 322,
                'y' => 570,
            ),
            18 => 
            array (
                'id' => 22,
                'box_id' => 5,
                'position' => 1,
                'x' => 267,
                'y' => 565,
            ),
            19 => 
            array (
                'id' => 23,
                'box_id' => 5,
                'position' => 2,
                'x' => 301,
                'y' => 585,
            ),
            20 => 
            array (
                'id' => 24,
                'box_id' => 5,
                'position' => 3,
                'x' => 264,
                'y' => 585,
            ),
            21 => 
            array (
                'id' => 25,
                'box_id' => 5,
                'position' => 4,
                'x' => 296,
                'y' => 602,
            ),
            22 => 
            array (
                'id' => 26,
                'box_id' => 6,
                'position' => 1,
                'x' => 250,
                'y' => 612,
            ),
            23 => 
            array (
                'id' => 27,
                'box_id' => 6,
                'position' => 2,
                'x' => 278,
                'y' => 625,
            ),
            24 => 
            array (
                'id' => 28,
                'box_id' => 6,
                'position' => 3,
                'x' => 245,
                'y' => 625,
            ),
            25 => 
            array (
                'id' => 29,
                'box_id' => 6,
                'position' => 4,
                'x' => 271,
                'y' => 643,
            ),
            26 => 
            array (
                'id' => 30,
                'box_id' => 7,
                'position' => 1,
                'x' => 226,
                'y' => 652,
            ),
            27 => 
            array (
                'id' => 31,
                'box_id' => 7,
                'position' => 2,
                'x' => 250,
                'y' => 668,
            ),
            28 => 
            array (
                'id' => 32,
                'box_id' => 7,
                'position' => 3,
                'x' => 215,
                'y' => 675,
            ),
            29 => 
            array (
                'id' => 33,
                'box_id' => 7,
                'position' => 4,
                'x' => 242,
                'y' => 682,
            ),
            30 => 
            array (
                'id' => 34,
                'box_id' => 8,
                'position' => 1,
                'x' => 272,
                'y' => 717,
            ),
            31 => 
            array (
                'id' => 35,
                'box_id' => 8,
                'position' => 2,
                'x' => 287,
                'y' => 681,
            ),
            32 => 
            array (
                'id' => 36,
                'box_id' => 8,
                'position' => 3,
                'x' => 294,
                'y' => 716,
            ),
            33 => 
            array (
                'id' => 37,
                'box_id' => 8,
                'position' => 4,
                'x' => 303,
                'y' => 685,
            ),
            34 => 
            array (
                'id' => 38,
                'box_id' => 9,
                'position' => 1,
                'x' => 331,
                'y' => 713,
            ),
            35 => 
            array (
                'id' => 39,
                'box_id' => 10,
                'position' => 1,
                'x' => 383,
                'y' => 696,
            ),
            36 => 
            array (
                'id' => 40,
                'box_id' => 10,
                'position' => 2,
                'x' => 381,
                'y' => 732,
            ),
            37 => 
            array (
                'id' => 41,
                'box_id' => 10,
                'position' => 3,
                'x' => 363,
                'y' => 733,
            ),
            38 => 
            array (
                'id' => 42,
                'box_id' => 10,
                'position' => 4,
                'x' => 367,
                'y' => 706,
            ),
            39 => 
            array (
                'id' => 43,
                'box_id' => 11,
                'position' => 1,
                'x' => 428,
                'y' => 734,
            ),
            40 => 
            array (
                'id' => 44,
                'box_id' => 11,
                'position' => 2,
                'x' => 408,
                'y' => 698,
            ),
            41 => 
            array (
                'id' => 45,
                'box_id' => 11,
                'position' => 3,
                'x' => 424,
                'y' => 706,
            ),
            42 => 
            array (
                'id' => 46,
                'box_id' => 11,
                'position' => 4,
                'x' => 409,
                'y' => 728,
            ),
            43 => 
            array (
                'id' => 47,
                'box_id' => 12,
                'position' => 1,
                'x' => 462,
                'y' => 716,
            ),
            44 => 
            array (
                'id' => 48,
                'box_id' => 13,
                'position' => 1,
                'x' => 502,
                'y' => 679,
            ),
            45 => 
            array (
                'id' => 49,
                'box_id' => 13,
                'position' => 2,
                'x' => 497,
                'y' => 713,
            ),
            46 => 
            array (
                'id' => 50,
                'box_id' => 13,
                'position' => 3,
                'x' => 489,
                'y' => 691,
            ),
            47 => 
            array (
                'id' => 51,
                'box_id' => 13,
                'position' => 4,
                'x' => 516,
                'y' => 708,
            ),
            48 => 
            array (
                'id' => 52,
                'box_id' => 14,
                'position' => 1,
                'x' => 415,
                'y' => 470,
            ),
            49 => 
            array (
                'id' => 53,
                'box_id' => 14,
                'position' => 2,
                'x' => 460,
                'y' => 468,
            ),
            50 => 
            array (
                'id' => 54,
                'box_id' => 14,
                'position' => 3,
                'x' => 432,
                'y' => 486,
            ),
            51 => 
            array (
                'id' => 55,
                'box_id' => 14,
                'position' => 4,
                'x' => 444,
                'y' => 451,
            ),
            52 => 
            array (
                'id' => 56,
                'box_id' => 15,
                'position' => 1,
                'x' => 447,
                'y' => 528,
            ),
            53 => 
            array (
                'id' => 57,
                'box_id' => 15,
                'position' => 2,
                'x' => 472,
                'y' => 495,
            ),
            54 => 
            array (
                'id' => 58,
                'box_id' => 15,
                'position' => 3,
                'x' => 443,
                'y' => 507,
            ),
            55 => 
            array (
                'id' => 59,
                'box_id' => 15,
                'position' => 4,
                'x' => 473,
                'y' => 510,
            ),
            56 => 
            array (
                'id' => 60,
                'box_id' => 16,
                'position' => 1,
                'x' => 469,
                'y' => 564,
            ),
            57 => 
            array (
                'id' => 61,
                'box_id' => 16,
                'position' => 2,
                'x' => 494,
                'y' => 533,
            ),
            58 => 
            array (
                'id' => 62,
                'box_id' => 16,
                'position' => 3,
                'x' => 471,
                'y' => 544,
            ),
            59 => 
            array (
                'id' => 63,
                'box_id' => 16,
                'position' => 4,
                'x' => 499,
                'y' => 549,
            ),
            60 => 
            array (
                'id' => 64,
                'box_id' => 17,
                'position' => 1,
                'x' => 517,
                'y' => 568,
            ),
            61 => 
            array (
                'id' => 65,
                'box_id' => 17,
                'position' => 2,
                'x' => 497,
                'y' => 598,
            ),
            62 => 
            array (
                'id' => 66,
                'box_id' => 17,
                'position' => 3,
                'x' => 521,
                'y' => 587,
            ),
            63 => 
            array (
                'id' => 67,
                'box_id' => 17,
                'position' => 4,
                'x' => 489,
                'y' => 581,
            ),
            64 => 
            array (
                'id' => 68,
                'box_id' => 18,
                'position' => 1,
                'x' => 548,
                'y' => 624,
            ),
            65 => 
            array (
                'id' => 69,
                'box_id' => 18,
                'position' => 2,
                'x' => 511,
                'y' => 625,
            ),
            66 => 
            array (
                'id' => 70,
                'box_id' => 18,
                'position' => 3,
                'x' => 517,
                'y' => 643,
            ),
            67 => 
            array (
                'id' => 71,
                'box_id' => 18,
                'position' => 4,
                'x' => 537,
                'y' => 607,
            ),
            68 => 
            array (
                'id' => 72,
                'box_id' => 19,
                'position' => 1,
                'x' => 549,
                'y' => 692,
            ),
            69 => 
            array (
                'id' => 73,
                'box_id' => 19,
                'position' => 2,
                'x' => 557,
                'y' => 655,
            ),
            70 => 
            array (
                'id' => 74,
                'box_id' => 19,
                'position' => 3,
                'x' => 576,
                'y' => 675,
            ),
            71 => 
            array (
                'id' => 75,
                'box_id' => 19,
                'position' => 4,
                'x' => 536,
                'y' => 666,
            ),
            72 => 
            array (
                'id' => 76,
                'box_id' => 20,
                'position' => 1,
                'x' => 591,
                'y' => 633,
            ),
            73 => 
            array (
                'id' => 77,
                'box_id' => 20,
                'position' => 2,
                'x' => 622,
                'y' => 641,
            ),
            74 => 
            array (
                'id' => 78,
                'box_id' => 20,
                'position' => 3,
                'x' => 605,
                'y' => 653,
            ),
            75 => 
            array (
                'id' => 79,
                'box_id' => 20,
                'position' => 4,
                'x' => 601,
                'y' => 618,
            ),
            76 => 
            array (
                'id' => 80,
                'box_id' => 21,
                'position' => 1,
                'x' => 637,
                'y' => 609,
            ),
            77 => 
            array (
                'id' => 81,
                'box_id' => 22,
                'position' => 1,
                'x' => 645,
                'y' => 568,
            ),
            78 => 
            array (
                'id' => 82,
                'box_id' => 22,
                'position' => 2,
                'x' => 680,
                'y' => 574,
            ),
            79 => 
            array (
                'id' => 83,
                'box_id' => 22,
                'position' => 3,
                'x' => 665,
                'y' => 586,
            ),
            80 => 
            array (
                'id' => 84,
                'box_id' => 22,
                'position' => 4,
                'x' => 657,
                'y' => 558,
            ),
            81 => 
            array (
                'id' => 85,
                'box_id' => 23,
                'position' => 1,
                'x' => 702,
                'y' => 534,
            ),
            82 => 
            array (
                'id' => 86,
                'box_id' => 23,
                'position' => 2,
                'x' => 669,
                'y' => 536,
            ),
            83 => 
            array (
                'id' => 87,
                'box_id' => 23,
                'position' => 3,
                'x' => 676,
                'y' => 523,
            ),
            84 => 
            array (
                'id' => 88,
                'box_id' => 23,
                'position' => 4,
                'x' => 688,
                'y' => 546,
            ),
            85 => 
            array (
                'id' => 89,
                'box_id' => 24,
                'position' => 1,
                'x' => 703,
                'y' => 496,
            ),
            86 => 
            array (
                'id' => 90,
                'box_id' => 25,
                'position' => 1,
                'x' => 695,
                'y' => 442,
            ),
            87 => 
            array (
                'id' => 91,
                'box_id' => 25,
                'position' => 2,
                'x' => 726,
                'y' => 466,
            ),
            88 => 
            array (
                'id' => 92,
                'box_id' => 25,
                'position' => 3,
                'x' => 727,
                'y' => 446,
            ),
            89 => 
            array (
                'id' => 93,
                'box_id' => 25,
                'position' => 4,
                'x' => 699,
                'y' => 458,
            ),
            90 => 
            array (
                'id' => 94,
                'box_id' => 26,
                'position' => 1,
                'x' => 472,
                'y' => 414,
            ),
            91 => 
            array (
                'id' => 95,
                'box_id' => 26,
                'position' => 2,
                'x' => 489,
                'y' => 373,
            ),
            92 => 
            array (
                'id' => 96,
                'box_id' => 26,
                'position' => 3,
                'x' => 469,
                'y' => 680,
            ),
            93 => 
            array (
                'id' => 97,
                'box_id' => 26,
                'position' => 4,
                'x' => 489,
                'y' => 405,
            ),
            94 => 
            array (
                'id' => 98,
                'box_id' => 27,
                'position' => 1,
                'x' => 516,
                'y' => 378,
            ),
            95 => 
            array (
                'id' => 99,
                'box_id' => 27,
                'position' => 2,
                'x' => 535,
                'y' => 405,
            ),
            96 => 
            array (
                'id' => 100,
                'box_id' => 27,
                'position' => 3,
                'x' => 517,
                'y' => 415,
            ),
            97 => 
            array (
                'id' => 101,
                'box_id' => 27,
                'position' => 4,
                'x' => 535,
                'y' => 375,
            ),
            98 => 
            array (
                'id' => 102,
                'box_id' => 28,
                'position' => 1,
                'x' => 579,
                'y' => 406,
            ),
            99 => 
            array (
                'id' => 103,
                'box_id' => 28,
                'position' => 2,
                'x' => 563,
                'y' => 384,
            ),
            100 => 
            array (
                'id' => 104,
                'box_id' => 28,
                'position' => 3,
                'x' => 581,
                'y' => 370,
            ),
            101 => 
            array (
                'id' => 105,
                'box_id' => 28,
                'position' => 4,
                'x' => 562,
                'y' => 416,
            ),
            102 => 
            array (
                'id' => 106,
                'box_id' => 29,
                'position' => 1,
                'x' => 603,
                'y' => 367,
            ),
            103 => 
            array (
                'id' => 107,
                'box_id' => 29,
                'position' => 2,
                'x' => 624,
                'y' => 401,
            ),
            104 => 
            array (
                'id' => 108,
                'box_id' => 29,
                'position' => 3,
                'x' => 626,
                'y' => 379,
            ),
            105 => 
            array (
                'id' => 109,
                'box_id' => 29,
                'position' => 4,
                'x' => 606,
                'y' => 414,
            ),
            106 => 
            array (
                'id' => 110,
                'box_id' => 30,
                'position' => 1,
                'x' => 665,
                'y' => 406,
            ),
            107 => 
            array (
                'id' => 111,
                'box_id' => 30,
                'position' => 2,
                'x' => 650,
                'y' => 371,
            ),
            108 => 
            array (
                'id' => 112,
                'box_id' => 30,
                'position' => 3,
                'x' => 666,
                'y' => 377,
            ),
            109 => 
            array (
                'id' => 113,
                'box_id' => 30,
                'position' => 4,
                'x' => 650,
                'y' => 416,
            ),
            110 => 
            array (
                'id' => 114,
                'box_id' => 31,
                'position' => 1,
                'x' => 703,
                'y' => 406,
            ),
            111 => 
            array (
                'id' => 115,
                'box_id' => 31,
                'position' => 2,
                'x' => 724,
                'y' => 378,
            ),
            112 => 
            array (
                'id' => 116,
                'box_id' => 31,
                'position' => 3,
                'x' => 704,
                'y' => 383,
            ),
            113 => 
            array (
                'id' => 117,
                'box_id' => 31,
                'position' => 4,
                'x' => 725,
                'y' => 401,
            ),
            114 => 
            array (
                'id' => 118,
                'box_id' => 32,
                'position' => 1,
                'x' => 722,
                'y' => 320,
            ),
            115 => 
            array (
                'id' => 119,
                'box_id' => 32,
                'position' => 2,
                'x' => 699,
                'y' => 338,
            ),
            116 => 
            array (
                'id' => 120,
                'box_id' => 32,
                'position' => 3,
                'x' => 699,
                'y' => 321,
            ),
            117 => 
            array (
                'id' => 121,
                'box_id' => 32,
                'position' => 4,
                'x' => 726,
                'y' => 336,
            ),
            118 => 
            array (
                'id' => 147,
                'box_id' => 33,
                'position' => 1,
                'x' => 699,
                'y' => 290,
            ),
            119 => 
            array (
                'id' => 148,
                'box_id' => 34,
                'position' => 1,
                'x' => 693,
                'y' => 236,
            ),
            120 => 
            array (
                'id' => 149,
                'box_id' => 34,
                'position' => 2,
                'x' => 676,
                'y' => 261,
            ),
            121 => 
            array (
                'id' => 150,
                'box_id' => 34,
                'position' => 3,
                'x' => 695,
                'y' => 253,
            ),
            122 => 
            array (
                'id' => 151,
                'box_id' => 34,
                'position' => 4,
                'x' => 668,
                'y' => 247,
            ),
            123 => 
            array (
                'id' => 152,
                'box_id' => 35,
                'position' => 1,
                'x' => 674,
                'y' => 214,
            ),
            124 => 
            array (
                'id' => 153,
                'box_id' => 35,
                'position' => 2,
                'x' => 647,
                'y' => 211,
            ),
            125 => 
            array (
                'id' => 154,
                'box_id' => 35,
                'position' => 3,
                'x' => 667,
                'y' => 193,
            ),
            126 => 
            array (
                'id' => 155,
                'box_id' => 35,
                'position' => 4,
                'x' => 653,
                'y' => 229,
            ),
            127 => 
            array (
                'id' => 156,
                'box_id' => 36,
                'position' => 1,
                'x' => 634,
                'y' => 178,
            ),
            128 => 
            array (
                'id' => 161,
                'box_id' => 37,
                'position' => 1,
                'x' => 617,
                'y' => 142,
            ),
            129 => 
            array (
                'id' => 162,
                'box_id' => 37,
                'position' => 2,
                'x' => 593,
                'y' => 151,
            ),
            130 => 
            array (
                'id' => 163,
                'box_id' => 37,
                'position' => 3,
                'x' => 605,
                'y' => 127,
            ),
            131 => 
            array (
                'id' => 164,
                'box_id' => 37,
                'position' => 4,
                'x' => 601,
                'y' => 165,
            ),
            132 => 
            array (
                'id' => 177,
                'box_id' => 38,
                'position' => 1,
                'x' => 418,
                'y' => 313,
            ),
            133 => 
            array (
                'id' => 178,
                'box_id' => 38,
                'position' => 2,
                'x' => 457,
                'y' => 317,
            ),
            134 => 
            array (
                'id' => 179,
                'box_id' => 38,
                'position' => 3,
                'x' => 424,
                'y' => 296,
            ),
            135 => 
            array (
                'id' => 180,
                'box_id' => 38,
                'position' => 4,
                'x' => 448,
                'y' => 331,
            ),
            136 => 
            array (
                'id' => 181,
                'box_id' => 39,
                'position' => 1,
                'x' => 480,
                'y' => 280,
            ),
            137 => 
            array (
                'id' => 182,
                'box_id' => 39,
                'position' => 2,
                'x' => 440,
                'y' => 275,
            ),
            138 => 
            array (
                'id' => 183,
                'box_id' => 39,
                'position' => 3,
                'x' => 472,
                'y' => 297,
            ),
            139 => 
            array (
                'id' => 184,
                'box_id' => 39,
                'position' => 4,
                'x' => 444,
                'y' => 255,
            ),
            140 => 
            array (
                'id' => 185,
                'box_id' => 40,
                'position' => 1,
                'x' => 460,
                'y' => 232,
            ),
            141 => 
            array (
                'id' => 186,
                'box_id' => 40,
                'position' => 2,
                'x' => 504,
                'y' => 239,
            ),
            142 => 
            array (
                'id' => 187,
                'box_id' => 40,
                'position' => 3,
                'x' => 492,
                'y' => 253,
            ),
            143 => 
            array (
                'id' => 188,
                'box_id' => 40,
                'position' => 4,
                'x' => 464,
                'y' => 215,
            ),
            144 => 
            array (
                'id' => 189,
                'box_id' => 41,
                'position' => 1,
                'x' => 491,
                'y' => 183,
            ),
            145 => 
            array (
                'id' => 190,
                'box_id' => 41,
                'position' => 2,
                'x' => 511,
                'y' => 214,
            ),
            146 => 
            array (
                'id' => 191,
                'box_id' => 41,
                'position' => 3,
                'x' => 524,
                'y' => 200,
            ),
            147 => 
            array (
                'id' => 192,
                'box_id' => 41,
                'position' => 4,
                'x' => 478,
                'y' => 197,
            ),
            148 => 
            array (
                'id' => 204,
                'box_id' => 42,
                'position' => 1,
                'x' => 534,
                'y' => 175,
            ),
            149 => 
            array (
                'id' => 205,
                'box_id' => 42,
                'position' => 2,
                'x' => 515,
                'y' => 144,
            ),
            150 => 
            array (
                'id' => 206,
                'box_id' => 42,
                'position' => 3,
                'x' => 548,
                'y' => 164,
            ),
            151 => 
            array (
                'id' => 207,
                'box_id' => 42,
                'position' => 4,
                'x' => 500,
                'y' => 156,
            ),
            152 => 
            array (
                'id' => 208,
                'box_id' => 43,
                'position' => 1,
                'x' => 559,
                'y' => 130,
            ),
            153 => 
            array (
                'id' => 209,
                'box_id' => 43,
                'position' => 2,
                'x' => 542,
                'y' => 96,
            ),
            154 => 
            array (
                'id' => 210,
                'box_id' => 43,
                'position' => 3,
                'x' => 574,
                'y' => 111,
            ),
            155 => 
            array (
                'id' => 211,
                'box_id' => 43,
                'position' => 4,
                'x' => 528,
                'y' => 117,
            ),
            156 => 
            array (
                'id' => 212,
                'box_id' => 44,
                'position' => 1,
                'x' => 508,
                'y' => 74,
            ),
            157 => 
            array (
                'id' => 213,
                'box_id' => 44,
                'position' => 2,
                'x' => 485,
                'y' => 101,
            ),
            158 => 
            array (
                'id' => 214,
                'box_id' => 44,
                'position' => 3,
                'x' => 492,
                'y' => 70,
            ),
            159 => 
            array (
                'id' => 215,
                'box_id' => 44,
                'position' => 4,
                'x' => 498,
                'y' => 100,
            ),
            160 => 
            array (
                'id' => 216,
                'box_id' => 45,
                'position' => 1,
                'x' => 457,
                'y' => 76,
            ),
            161 => 
            array (
                'id' => 217,
                'box_id' => 46,
                'position' => 1,
                'x' => 408,
                'y' => 56,
            ),
            162 => 
            array (
                'id' => 218,
                'box_id' => 46,
                'position' => 2,
                'x' => 417,
                'y' => 88,
            ),
            163 => 
            array (
                'id' => 219,
                'box_id' => 46,
                'position' => 3,
                'x' => 406,
                'y' => 90,
            ),
            164 => 
            array (
                'id' => 220,
                'box_id' => 46,
                'position' => 4,
                'x' => 422,
                'y' => 61,
            ),
            165 => 
            array (
                'id' => 221,
                'box_id' => 47,
                'position' => 1,
                'x' => 366,
                'y' => 88,
            ),
            166 => 
            array (
                'id' => 222,
                'box_id' => 47,
                'position' => 2,
                'x' => 379,
                'y' => 55,
            ),
            167 => 
            array (
                'id' => 223,
                'box_id' => 47,
                'position' => 3,
                'x' => 361,
                'y' => 55,
            ),
            168 => 
            array (
                'id' => 224,
                'box_id' => 47,
                'position' => 4,
                'x' => 381,
                'y' => 89,
            ),
            169 => 
            array (
                'id' => 225,
                'box_id' => 48,
                'position' => 1,
                'x' => 329,
                'y' => 75,
            ),
            170 => 
            array (
                'id' => 226,
                'box_id' => 49,
                'position' => 1,
                'x' => 293,
                'y' => 72,
            ),
            171 => 
            array (
                'id' => 227,
                'box_id' => 49,
                'position' => 2,
                'x' => 287,
                'y' => 103,
            ),
            172 => 
            array (
                'id' => 228,
                'box_id' => 49,
                'position' => 3,
                'x' => 303,
                'y' => 100,
            ),
            173 => 
            array (
                'id' => 229,
                'box_id' => 49,
                'position' => 4,
                'x' => 272,
                'y' => 74,
            ),
            174 => 
            array (
                'id' => 230,
                'box_id' => 50,
                'position' => 1,
                'x' => 338,
                'y' => 330,
            ),
            175 => 
            array (
                'id' => 231,
                'box_id' => 50,
                'position' => 2,
                'x' => 363,
                'y' => 302,
            ),
            176 => 
            array (
                'id' => 232,
                'box_id' => 50,
                'position' => 3,
                'x' => 372,
                'y' => 313,
            ),
            177 => 
            array (
                'id' => 233,
                'box_id' => 50,
                'position' => 4,
                'x' => 328,
                'y' => 317,
            ),
            178 => 
            array (
                'id' => 234,
                'box_id' => 51,
                'position' => 1,
                'x' => 342,
                'y' => 260,
            ),
            179 => 
            array (
                'id' => 235,
                'box_id' => 51,
                'position' => 2,
                'x' => 317,
                'y' => 292,
            ),
            180 => 
            array (
                'id' => 236,
                'box_id' => 51,
                'position' => 3,
                'x' => 308,
                'y' => 278,
            ),
            181 => 
            array (
                'id' => 237,
                'box_id' => 51,
                'position' => 4,
                'x' => 353,
                'y' => 274,
            ),
            182 => 
            array (
                'id' => 238,
                'box_id' => 52,
                'position' => 1,
                'x' => 295,
                'y' => 253,
            ),
            183 => 
            array (
                'id' => 239,
                'box_id' => 52,
                'position' => 2,
                'x' => 317,
                'y' => 224,
            ),
            184 => 
            array (
                'id' => 240,
                'box_id' => 52,
                'position' => 3,
                'x' => 284,
                'y' => 238,
            ),
            185 => 
            array (
                'id' => 241,
                'box_id' => 52,
                'position' => 4,
                'x' => 327,
                'y' => 237,
            ),
            186 => 
            array (
                'id' => 242,
                'box_id' => 53,
                'position' => 1,
                'x' => 304,
                'y' => 197,
            ),
            187 => 
            array (
                'id' => 243,
                'box_id' => 53,
                'position' => 2,
                'x' => 266,
                'y' => 201,
            ),
            188 => 
            array (
                'id' => 244,
                'box_id' => 53,
                'position' => 3,
                'x' => 271,
                'y' => 218,
            ),
            189 => 
            array (
                'id' => 245,
                'box_id' => 53,
                'position' => 4,
                'x' => 298,
                'y' => 181,
            ),
            190 => 
            array (
                'id' => 246,
                'box_id' => 54,
                'position' => 1,
                'x' => 245,
                'y' => 163,
            ),
            191 => 
            array (
                'id' => 247,
                'box_id' => 54,
                'position' => 2,
                'x' => 281,
                'y' => 158,
            ),
            192 => 
            array (
                'id' => 248,
                'box_id' => 54,
                'position' => 3,
                'x' => 277,
                'y' => 141,
            ),
            193 => 
            array (
                'id' => 249,
                'box_id' => 54,
                'position' => 4,
                'x' => 247,
                'y' => 182,
            ),
            194 => 
            array (
                'id' => 250,
                'box_id' => 55,
                'position' => 1,
                'x' => 240,
                'y' => 99,
            ),
            195 => 
            array (
                'id' => 251,
                'box_id' => 55,
                'position' => 2,
                'x' => 226,
                'y' => 129,
            ),
            196 => 
            array (
                'id' => 252,
                'box_id' => 55,
                'position' => 3,
                'x' => 214,
                'y' => 112,
            ),
            197 => 
            array (
                'id' => 253,
                'box_id' => 55,
                'position' => 4,
                'x' => 255,
                'y' => 115,
            ),
            198 => 
            array (
                'id' => 254,
                'box_id' => 56,
                'position' => 1,
                'x' => 197,
                'y' => 155,
            ),
            199 => 
            array (
                'id' => 255,
                'box_id' => 56,
                'position' => 2,
                'x' => 167,
                'y' => 145,
            ),
            200 => 
            array (
                'id' => 256,
                'box_id' => 56,
                'position' => 3,
                'x' => 181,
                'y' => 131,
            ),
            201 => 
            array (
                'id' => 257,
                'box_id' => 56,
                'position' => 4,
                'x' => 191,
                'y' => 170,
            ),
            202 => 
            array (
                'id' => 258,
                'box_id' => 57,
                'position' => 1,
                'x' => 152,
                'y' => 180,
            ),
            203 => 
            array (
                'id' => 259,
                'box_id' => 58,
                'position' => 1,
                'x' => 119,
                'y' => 199,
            ),
            204 => 
            array (
                'id' => 260,
                'box_id' => 58,
                'position' => 2,
                'x' => 133,
                'y' => 228,
            ),
            205 => 
            array (
                'id' => 261,
                'box_id' => 58,
                'position' => 3,
                'x' => 109,
                'y' => 213,
            ),
            206 => 
            array (
                'id' => 262,
                'box_id' => 58,
                'position' => 4,
                'x' => 146,
                'y' => 217,
            ),
            207 => 
            array (
                'id' => 263,
                'box_id' => 59,
                'position' => 1,
                'x' => 94,
                'y' => 237,
            ),
            208 => 
            array (
                'id' => 264,
                'box_id' => 59,
                'position' => 2,
                'x' => 115,
                'y' => 265,
            ),
            209 => 
            array (
                'id' => 265,
                'box_id' => 59,
                'position' => 3,
                'x' => 124,
                'y' => 251,
            ),
            210 => 
            array (
                'id' => 266,
                'box_id' => 59,
                'position' => 4,
                'x' => 85,
                'y' => 252,
            ),
            211 => 
            array (
                'id' => 267,
                'box_id' => 60,
                'position' => 1,
                'x' => 87,
                'y' => 290,
            ),
            212 => 
            array (
                'id' => 268,
                'box_id' => 61,
                'position' => 1,
                'x' => 63,
                'y' => 320,
            ),
            213 => 
            array (
                'id' => 269,
                'box_id' => 61,
                'position' => 2,
                'x' => 89,
                'y' => 342,
            ),
            214 => 
            array (
                'id' => 270,
                'box_id' => 61,
                'position' => 3,
                'x' => 92,
                'y' => 325,
            ),
            215 => 
            array (
                'id' => 271,
                'box_id' => 61,
                'position' => 4,
                'x' => 58,
                'y' => 338,
            ),
            216 => 
            array (
                'id' => 272,
                'box_id' => 62,
                'position' => 1,
                'x' => 311,
                'y' => 376,
            ),
            217 => 
            array (
                'id' => 273,
                'box_id' => 62,
                'position' => 2,
                'x' => 297,
                'y' => 411,
            ),
            218 => 
            array (
                'id' => 274,
                'box_id' => 62,
                'position' => 3,
                'x' => 313,
                'y' => 414,
            ),
            219 => 
            array (
                'id' => 275,
                'box_id' => 62,
                'position' => 4,
                'x' => 296,
                'y' => 369,
            ),
            220 => 
            array (
                'id' => 276,
                'box_id' => 63,
                'position' => 1,
                'x' => 254,
                'y' => 406,
            ),
            221 => 
            array (
                'id' => 277,
                'box_id' => 63,
                'position' => 2,
                'x' => 270,
                'y' => 375,
            ),
            222 => 
            array (
                'id' => 278,
                'box_id' => 63,
                'position' => 3,
                'x' => 251,
                'y' => 370,
            ),
            223 => 
            array (
                'id' => 279,
                'box_id' => 63,
                'position' => 4,
                'x' => 270,
                'y' => 414,
            ),
            224 => 
            array (
                'id' => 280,
                'box_id' => 64,
                'position' => 1,
                'x' => 209,
                'y' => 379,
            ),
            225 => 
            array (
                'id' => 281,
                'box_id' => 64,
                'position' => 2,
                'x' => 223,
                'y' => 407,
            ),
            226 => 
            array (
                'id' => 282,
                'box_id' => 64,
                'position' => 3,
                'x' => 209,
                'y' => 411,
            ),
            227 => 
            array (
                'id' => 283,
                'box_id' => 64,
                'position' => 4,
                'x' => 225,
                'y' => 371,
            ),
            228 => 
            array (
                'id' => 284,
                'box_id' => 65,
                'position' => 1,
                'x' => 180,
                'y' => 406,
            ),
            229 => 
            array (
                'id' => 285,
                'box_id' => 65,
                'position' => 2,
                'x' => 165,
                'y' => 380,
            ),
            230 => 
            array (
                'id' => 286,
                'box_id' => 65,
                'position' => 3,
                'x' => 180,
                'y' => 372,
            ),
            231 => 
            array (
                'id' => 287,
                'box_id' => 65,
                'position' => 4,
                'x' => 161,
                'y' => 415,
            ),
            232 => 
            array (
                'id' => 288,
                'box_id' => 66,
                'position' => 1,
                'x' => 119,
                'y' => 379,
            ),
            233 => 
            array (
                'id' => 289,
                'box_id' => 66,
                'position' => 2,
                'x' => 133,
                'y' => 405,
            ),
            234 => 
            array (
                'id' => 290,
                'box_id' => 66,
                'position' => 3,
                'x' => 120,
                'y' => 411,
            ),
            235 => 
            array (
                'id' => 291,
                'box_id' => 66,
                'position' => 4,
                'x' => 135,
                'y' => 370,
            ),
            236 => 
            array (
                'id' => 292,
                'box_id' => 67,
                'position' => 1,
                'x' => 65,
                'y' => 381,
            ),
            237 => 
            array (
                'id' => 293,
                'box_id' => 67,
                'position' => 2,
                'x' => 81,
                'y' => 407,
            ),
            238 => 
            array (
                'id' => 294,
                'box_id' => 67,
                'position' => 3,
                'x' => 62,
                'y' => 409,
            ),
            239 => 
            array (
                'id' => 295,
                'box_id' => 67,
                'position' => 4,
                'x' => 85,
                'y' => 381,
            ),
            240 => 
            array (
                'id' => 296,
                'box_id' => 68,
                'position' => 1,
                'x' => 63,
                'y' => 451,
            ),
            241 => 
            array (
                'id' => 297,
                'box_id' => 68,
                'position' => 2,
                'x' => 88,
                'y' => 459,
            ),
            242 => 
            array (
                'id' => 298,
                'box_id' => 68,
                'position' => 3,
                'x' => 62,
                'y' => 470,
            ),
            243 => 
            array (
                'id' => 299,
                'box_id' => 68,
                'position' => 4,
                'x' => 89,
                'y' => 445,
            ),
            244 => 
            array (
                'id' => 300,
                'box_id' => 69,
                'position' => 1,
                'x' => 88,
                'y' => 497,
            ),
            245 => 
            array (
                'id' => 301,
                'box_id' => 70,
                'position' => 1,
                'x' => 92,
                'y' => 536,
            ),
            246 => 
            array (
                'id' => 302,
                'box_id' => 70,
                'position' => 2,
                'x' => 117,
                'y' => 537,
            ),
            247 => 
            array (
                'id' => 303,
                'box_id' => 70,
                'position' => 3,
                'x' => 114,
                'y' => 522,
            ),
            248 => 
            array (
                'id' => 304,
                'box_id' => 70,
                'position' => 4,
                'x' => 94,
                'y' => 552,
            ),
            249 => 
            array (
                'id' => 305,
                'box_id' => 71,
                'position' => 1,
                'x' => 112,
                'y' => 575,
            ),
            250 => 
            array (
                'id' => 306,
                'box_id' => 71,
                'position' => 2,
                'x' => 140,
                'y' => 574,
            ),
            251 => 
            array (
                'id' => 307,
                'box_id' => 71,
                'position' => 3,
                'x' => 134,
                'y' => 559,
            ),
            252 => 
            array (
                'id' => 308,
                'box_id' => 71,
                'position' => 4,
                'x' => 119,
                'y' => 591,
            ),
            253 => 
            array (
                'id' => 309,
                'box_id' => 72,
                'position' => 1,
                'x' => 153,
                'y' => 610,
            ),
            254 => 
            array (
                'id' => 310,
                'box_id' => 73,
                'position' => 1,
                'x' => 169,
                'y' => 643,
            ),
            255 => 
            array (
                'id' => 311,
                'box_id' => 73,
                'position' => 2,
                'x' => 195,
                'y' => 633,
            ),
            256 => 
            array (
                'id' => 312,
                'box_id' => 73,
                'position' => 3,
                'x' => 187,
                'y' => 621,
            ),
            257 => 
            array (
                'id' => 313,
                'box_id' => 73,
                'position' => 4,
                'x' => 185,
                'y' => 650,
            ),
        ));
        
        
    }
}