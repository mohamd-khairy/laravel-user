<?php

use Illuminate\Database\Seeder;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offer_list')->insert([
            [
                'id' => '1',
                'active' =>'1',
            ],[
                'id'=> '2',
                'active' =>'0'
            ],
            [
                'id' => '3',
                'active' =>'0'
            ],
            [
                'id' => '4',
                'active' =>'1'
            
            ],
          [
            'id' => '5',
            'active' =>'1'
          ]]);
    }
}
