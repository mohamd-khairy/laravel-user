<?php

use Illuminate\Database\Seeder;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feature')->insert([
       [
                //1-View
                'id' => '1',
                'type_id' => '1'
        ]
        ,
        [
                'id'=> '2',
                'type_id' => '1'
        ]
        ,
        [
                'id' => '3',
                'type_id' => '1'
        ]
        ,
        [
               'id' => '4',
                'type_id' => '1'

        ]
        ,
        [
            'id' => '5',
            'type_id' => '1'
        ]
        ,
        [
            'id' => '6',
            'type_id' => '1'
        ]
        ,

        //*******3- Setup************************** */

        //********** 4-Outdoor_Facilities*/

        [
            'id' => '20',
            'type_id' => '4'
        ]

        ,
        [
            'id' => '21',
            'type_id' => '4'
        ]
        ,
        [
            'id' => '22',
            'type_id' => '4'
        ]
        ,
        [
            'id' => '23',
            'type_id' => '4'
        ]
        ,
        [
            'id' => '24',
            'type_id' => '4'
        ]
        ,
        [
            'id' => '25',
            'type_id' => '4'
        ]
        ,
        [
            'id' => '26',
            'type_id' => '4'
        ]
        ,
        [
            'id' => '27',
            'type_id' => '4'
        ]
        ,
        [
            'id' => '28',
            'type_id' => '4'
        ]
        ,
        [
            'id' => '29',
            'type_id' => '4'
        ]
        ,
        [
            'id' => '30',
            'type_id' => '4'
        ]
        ,
        [
            'id' => '31',
            'type_id' => '4'
        ]
        ,
        [
            'id' => '32',
            'type_id' => '4'
        ]
        ,
        [
            'id' => '33',
            'type_id' => '4'
        ]
        //********5-Indoor_Facilities */
        ,
        [
            'id' => '34',
            'type_id' => '5'
        ]
        ,
        [
            'id' => '35',
            'type_id' => '5'
        ]
        ,
        [
            'id' => '36',
            'type_id' => '5'
        ]
        ,
        [
            'id' => '37',
            'type_id' => '5'
        ]
        ,
        [
            'id' => '38',
            'type_id' => '5'
        ]
        ,
        [
            'id' => '39',
            'type_id' => '5'
        ]
        ,
        [
            'id' => '40',
            'type_id' => '5'
        ]
        ,
        [
            'id' => '41',
            'type_id' => '5'
        ]
        ,
        [
            'id' => '42',
            'type_id' => '5'
        ]
        ,
        [
            'id' => '43',
            'type_id' => '5'
        ]
        //Food Type
        ,
        [
            'id' => '44',
            'type_id' => '6'
        ],
        [
            'id' => '45',
            'type_id' => '6'
        ],
        [
            'id' => '46',
            'type_id' => '6'
        ]
        ]);
    }
}
