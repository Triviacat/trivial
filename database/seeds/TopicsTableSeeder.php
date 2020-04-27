<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('topics')->delete();
        
        \DB::table('topics')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'geography',
                'color' => '#0021ff',
                'created_at' => '2020-03-29 11:28:54',
                'updated_at' => '2020-03-29 11:28:54',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'leisure',
                'color' => '#ff0000',
                'created_at' => '2020-03-29 11:29:10',
                'updated_at' => '2020-03-29 11:29:10',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'history',
                'color' => '#fffd00',
                'created_at' => '2020-03-29 11:29:32',
                'updated_at' => '2020-03-29 11:29:32',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'language',
                'color' => '#6F2E00',
                'created_at' => '2020-03-29 11:29:48',
                'updated_at' => '2020-03-29 11:29:48',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'thingsInLife',
                'color' => '#00e000',
                'created_at' => '2020-03-29 11:30:09',
                'updated_at' => '2020-03-29 11:30:09',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'sports',
                'color' => '#ff9300',
                'created_at' => '2020-03-29 11:30:23',
                'updated_at' => '2020-03-29 11:30:23',
            ),
        ));
        
        
    }
}