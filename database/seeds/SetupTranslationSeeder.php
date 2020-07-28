<?php

use Illuminate\Database\Seeder;

class SetupTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setup_translation')->insert([
        //setup

        [
            'id' => '1',
            'setup_id' => '1',
            'locale' => 'en',
            'name' => 'Banquet\Wedding Style',
        ]
            ,
            [
                'id' => '2',
                'setup_id' => '1',
                'locale' => 'ar',
                'name' => 'مأدبة\زفاف  ',
            ]
            ,
            [
                'id' => '3',
                'setup_id' => '2',
                'locale' => 'en',
                'name' => 'Hollow \Square Style',
            ]
            ,
            [
                'id' => '4',
                'setup_id' => '2',
                'locale' => 'ar',
                'name' => 'نمط مربع الشكل ',
            ]
            ,
            [
                'id' => '5',
                'setup_id' => '3',
                'locale' => 'en',
                'name' => 'Theater Style',
            ]
            ,
            [
                'id' => '6',
                'setup_id' => '3',
                'locale' => 'ar',
                'name' => 'نمط مسرحي ',
            ]
            ,
            [
                'id' => '7',
                'setup_id' => '4',
                'locale' => 'en',
                'name' =>'Boared Meeting Style',
            ]
            ,
            [
                'id' => '8',
                'setup_id' => '4',
                'locale' => 'ar',
                'name' => 'نمط اجتماعات  ',
            ]
            ,
            [
                'id' => '9',
                'setup_id' => '5',
                'locale' => 'en',
                'name' =>'Lecture\School Style',
            ]
            ,
            [
                'id' => '10',
                'setup_id' => '5',
                'locale' => 'ar',
                'name' =>'نمط جامعي / مدرسي',
            ],
            [
                'id' => '11',
                'setup_id' => '6',
                'locale' => 'en',
                'name' =>'U Style',
            ]
            ,
            [
                'id' => '12',
                'setup_id' => '6',
                'locale' => 'ar',
                'name' =>'نمط U',
            ]
            ,
            [
                'id' => '13',
                'setup_id' => '7',
                'locale' => 'en',
                'name' =>'T-Shape Style',
            ]
            ,
            [
                'id' => '14',
                'setup_id' => '7',
                'locale' => 'ar',
                'name' =>'نمط T',
            ]
            ,
            [
                'id' => '15',
                'setup_id' => '8',
                'locale' => 'en',
                'name' =>'Herringbone/FishBone Style',
            ]
            ,
            [
                'id' => '16',
                'setup_id' => '8',
                'locale' => 'ar',
                'name' =>'نمط متعرج/ نمط هيكل السمكة',
            ]
            ,
            [
                'id' => '17',
                'setup_id' => '9',
                'locale' => 'en',
                'name' =>'Fixed Style',
            ]
            ,
            [
                'id' => '18',
                'setup_id' => '9',
                'locale' => 'ar',
                'name' =>'نمط ثابت',
            ]
        ]);
    }
}
