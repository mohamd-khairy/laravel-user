<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_type')->insert([

            [
                'id' => '1',
                'parent_id' => '0',
                'show_in_homePage' => 1,
                'status' =>'1',
            ],
            [
                'id'=> '2',
                'parent_id' => '0',
                'show_in_homePage' => 1,
                'status' =>'1',
            ],
            [
                'id' => '3',
                'parent_id' => '0',
                'show_in_homePage' => 1,
                'status' =>'0',
            ], [
                'id' => '4',
                'parent_id' => '0',
                'show_in_homePage' => 1,
                'status' =>'0',
            ],
            [
                'id' => '5',
                'parent_id' => '0',
                'show_in_homePage' => 1,
                'status' =>'0',
            ],
            [
                'id' => '6',
                'parent_id' => '0',
                'show_in_homePage' => 1,
                'status' =>'0',
            ],
            [
                'id' => '7',
                'parent_id' => '0',
                'show_in_homePage' => 1,
                'status' =>'0',
            ],

            [
                'id' => '8',
                'parent_id' => '0',
                'show_in_homePage' => 1,
                'status' =>'0',
            ],
            //sub 1 Places
            [
                'id' => '9',
                'parent_id' => '1',
                'show_in_homePage' => 1,
                'status' =>'1',
            ],
            [
                'id' => '10',
                'parent_id' => '1',
                'show_in_homePage' => 1,
                'status' =>'1',
            ],
            [
                'id' => '11',
                'parent_id' => '1',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '12',
                'parent_id' => '1',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '13',
                'parent_id' => '1',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '14',
                'parent_id' => '1',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '15',
                'parent_id' => '1',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '16',
                'parent_id' => '1',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '17',
                'parent_id' => '1',
'show_in_homePage' => 1,

                'status' =>'1',
            ]
            ,
            [
                'id' => '18',
                'parent_id' => '1',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            //sub 2 Food
            ,
            [
                'id' => '19',
                'parent_id' => '2',
                'show_in_homePage' => 1,
                'status' =>'1',
            ],
            [
                'id' => '20',
                'parent_id' => '2',
                'show_in_homePage' => 1,
                'status' =>'1',
            ],
            [
                'id' => '21',
                'parent_id' => '2',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '22',
                'parent_id' => '2',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '23',
                'parent_id' => '2',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            //sub 3 Party Equipment
            ,
            [
                'id' => '24',
                'parent_id' => '3',
                'show_in_homePage' => 1,
                'status' =>'1',
            ],
            [
                'id' => '25',
                'parent_id' => '3',
                'show_in_homePage' => 1,
                'status' =>'1',
            ],
            [
                'id' => '26',
                'parent_id' => '3',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '27',
                'parent_id' => '3',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '28',
                'parent_id' => '3',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '29',
                'parent_id' => '3',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '30',
                'parent_id' => '3',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '31',
                'parent_id' => '3',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '32',
                'parent_id' => '3',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '33',
                'parent_id' => '3',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '34',
                'parent_id' => '3',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]

            //sub 4 Clothes& Fashion
            ,
            [
                'id' => '35',
                'parent_id' => '4',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '36',
                'parent_id' => '4',
                'show_in_homePage' => 1,
                'status' =>'1',
            ],
            [
                'id' => '37',
                'parent_id' => '4',
                'show_in_homePage' => 1,
                'status' =>'1',
            ],
            [
                'id' => '38',
                'parent_id' => '4',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]

            //sub  5 Cars
            ,
            [
                'id' => '39',
                'parent_id' => '5',
                'show_in_homePage' => 1,
                'status' =>'1',
            ]
            ,
            [
                'id' => '40',
                'parent_id' => '5',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '41',
                'parent_id' => '5',
                'status' => '1',
                'show_in_homePage' => '1',
            ]

            //sub 6 Art
            ,
            [
                'id' => '42',
                'parent_id' => '6',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '43',
                'parent_id' => '6',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '44',
                'parent_id' => '6',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '45',
                'parent_id' => '6',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '46',
                'parent_id' => '6',
                'status' => '1',
                'show_in_homePage' => '1',
            ]

            //sub  7 Gifts and accessories
            ,
            [
                'id' => '47',
                'parent_id' => '7',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '48',
                'parent_id' => '7',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '49',
                'parent_id' => '7',
                'status' => '1',
                'show_in_homePage' => '1',
            ]
            //sub 8 Services
            ,
            [
                'id' => '50',
                'parent_id' => '8',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '51',
                'parent_id' => '8',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '52',
                'parent_id' => '8',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '53',
                'parent_id' => '8',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '54',
                'parent_id' => '8',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '55',
                'parent_id' => '8',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '56',
                'parent_id' => '8',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '57',
                'parent_id' => '8',
                'status' => '1',
                'show_in_homePage' => '1',
            ]

            /*

            *
            * *
            *
            * */
            ///Sub Sub Category of place /Entertainment halls/
            ,
            [
                'id' => '58',
                'parent_id' => '17',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '59',
                'parent_id' => '17',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '60',
                'parent_id' => '17',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '61',
                'parent_id' => '17',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '62',
                'parent_id' => '17',
                'status' => '1',
                'show_in_homePage' => '1',
            ]
            // Sub Sub Category of place/ Educational halls/
            ,
            [
                'id' => '63',
                'parent_id' => '18',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '64',
                'parent_id' => '18',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '65',
                'parent_id' => '18',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '66',
                'parent_id' => '18',
                'status' => '1',
                'show_in_homePage' => '1',
            ]
            //  Sub Sub Cetegory of Art// Shows/
            ,
            [
                'id' => '67',
                'parent_id' => '46',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '68',
                'parent_id' => '46',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '69',
                'parent_id' => '46',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '70',
                'parent_id' => '46',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '71',
                'parent_id' => '46',
                'status' => '1',
                'show_in_homePage' => '1',
            ]
            //Sub Sub Of Services / Influencers/
            ,
            [
                'id' => '72',
                'parent_id' => '53',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '73',
                'parent_id' => '53',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '74',
                'parent_id' => '53',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '75',
                'parent_id' => '53',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '76',
                'parent_id' => '53',
                'status' => '1',
                'show_in_homePage' => '1',
            ],
            [
                'id' => '77',
                'parent_id' => '53',
                'status' => '1',
                'show_in_homePage' => '1',
            ]



        ]);
    }
}
