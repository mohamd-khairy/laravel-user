<?php

use Illuminate\Database\Seeder;

class occasionTranslationTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offer_occasion_translation')->insert([
            [
                'id' => '1',
                'offer_occasion_id' => '1',
                'locale' => 'en',
                'name' => 'Mothers Day',
            ],
            [
                'id' => '2',
                'offer_occasion_id' => '1',
                'locale' => 'ar',
                'name' => 'عيد الأم',
            ],
            [
                'id' => '3',
                'offer_occasion_id' => '2',
                'locale' => 'en',
                'name' => '25 Jan',
            ],
            [
                'id' => '4',
                'offer_occasion_id' => '2',
                'locale' => 'ar',
                'name' => '25 يناير ',
            ],
            [
                'id' => '5',
                'offer_occasion_id' => '3',
                'locale' => 'en',
                'name' => 'Worker Day',
            ],
            [
                'id' => '6',
                'offer_occasion_id' => '3',
                'locale' => 'ar',
                'name' => 'عيد العمال ',
            ],
            [
                'id' => '7',
                'offer_occasion_id' => '4',
                'locale' => 'en',
                'name' =>'Eied-Fitr',
            ],
            [
                'id' => '8',
                'offer_occasion_id' => '4',
                'locale' => 'ar',
                'name' => 'عيد الفطر  ',
            ],
            [
                'id' => '9',
                'offer_occasion_id' => '5',
                'locale' => 'en',
                'name' =>'Eied -Adha ',
            ],
            [
                'id' => '10',
                'offer_occasion_id' => '5',
                'locale' => 'ar',
                'name' =>'عيد الاضحى ',
            ] ]);
    }
}
