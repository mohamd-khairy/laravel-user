<?php

use Illuminate\Database\Seeder;

class DocTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_type')->insert([
            [
                'id' => '1',
                'countries_id'=>'2',
                'length_validation'=>'5',
                'active' =>'1',
            ],
            [
                'id'=> '2',
                'countries_id'=>'2',
                'length_validation'=>'4',
                'active' =>'0'
            ],
            [
                'id' => '3',
                'countries_id'=>'2',
                'length_validation'=>'14',
                'active' =>'1'
            ]
          ]);
        }
}
