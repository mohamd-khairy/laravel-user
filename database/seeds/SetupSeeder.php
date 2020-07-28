<?php

use Illuminate\Database\Seeder;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setup')->insert([

        [
            'id' => '1',
            'image' =>null,        ]
        ,
        [
            'id' => '2',
            'image' =>null,        ]
        ,
        [
            'id' => '3',
            'image' =>null,        ],
        [
            'id' => '4',
            'image' =>null,        ]
        ,
        [
            'id' => '5',
            'image' =>null,        ]
        ,
        [
            'id' => '6',
            'image' =>null,        ]
        ,
        [
            'id' => '7',
            'image' =>null,
        ]
        ,
        [
            'id' => '8',
            'image' =>null,
        ]
        ,
        [
            'id' => '9',
            'image' =>null,

        ]

            ]);
    }
}
