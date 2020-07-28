<?php

use Illuminate\Database\Seeder;

class FitsWithTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fits_with')->insert([
            //******* 2-Fits_with************************** */
            [
                'id' => '1',
                'status' => '1',
                'show_in_homepage'=>'1',
                'position'=>'1',
            ]
            ,
            [
                'id' => '2',
                'status' => '1',
                'show_in_homepage'=>'1',
                'position'=>'2',
            ],
            [
                'id' => '3',
                'status' => '1',
                'show_in_homepage'=>'1',
                'position'=>'3',
            ]
            ,
            [
                'id' => '4',
                'status' => '1',
                'show_in_homepage'=>'1',
                'position'=>'4',
            ]
            ,
        ]);
    }
}
