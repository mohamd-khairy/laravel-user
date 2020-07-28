<?php

use Illuminate\Database\Seeder;

class FitsWithTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fits_with_translation')->insert([
            //2-fits_with
            [
                'id' => '1',
                'fits_with_id' => '1',
                'locale' => 'en',
                'name' => 'Organizational Events',
            ],
            [
                'id' => '2',
                'fits_with_id' => '1',
                'locale' => 'ar',
                'name' => 'المناسبات التنظيمية',
            ],
            [
                'id' => '3',
                'fits_with_id' => '2',
                'locale' => 'en',
                'name' => 'Cultural Events',
            ],
            [
                'id' => '4',
                'fits_with_id' => '2',
                'locale' => 'ar',
                'name' => 'المناسبات الثقافية',
            ],
            [
                'id' => '5',
                'fits_with_id' => '3',
                'locale' => 'en',
                'name' => 'Leisure Events',
            ],
            [
                'id' => '6',
                'fits_with_id' => '3',
                'locale' => 'ar',
                'name' => 'المناسبات الترفيهية',
            ],
            [
                'id' => '7',
                'fits_with_id' => '4',
                'locale' => 'en',
                'name' => 'Personal Events',
            ],
            [
                'id' => '8',
                'fits_with_id' => '4',
                'locale' => 'ar',
                'name' => 'المناسبات الشخصية',
            ]
        ]);
    }
}