<?php

use Illuminate\Database\Seeder;

class FeatureTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feature_type')->insert([

            [
                'id' => '1',
                'name' =>'View',
            ],
            [
                'id' => '3',
                'name' =>'Setup'
            ],
            [
                'id' => '4',
                'name' =>'Outdoor Facilities'
            ]
            ,
            [
                'id' => '5',
                'name' =>'Indoor Facilities'
            ]
            ,
            [
                'id' => '6',
                'name' =>'Food Types'

            ]
        ]);
    }
}
