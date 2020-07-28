<?php

use Illuminate\Database\Seeder;

class OffersTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setup_translation')->insert([
            [
                'id' => '1',
                'offer_list_id' => '1',
                'locale' => 'en',
                'name' => 'Mother\s Day',
            ],
            [
                'id' => '2',
                'offer_list_id' => '1',
                'locale' => 'ar',
                'name' => 'عيد الأم ',
            ],
            [
                'id' => '3',
                'offer_list_id' => '2',
                'locale' => 'en',
                'name' => 'Easter',
            ],
            [
                'id' => '4',
                'offer_list_id' => '2',
                'locale' => 'ar',
                'name' => 'شم النسيم ',
            ],
            [
                'id' => '5',
                'offer_list_id' => '3',
                'locale' => 'en',
                'name' => 'Eid al-Fitr',
            ],
            [
                'id' => '6',
                'offer_list_id' => '3',
                'locale' => 'ar',
                'name' => 'عيد الفطر المبارك ',
            ],
            [
                'id' => '7',
                'offer_list_id' => '4',
                'locale' => 'en',
                'name' =>'Eid al-Adha',
            ],
            [
                'id' => '8',
                'offer_list_id' => '4',
                'locale' => 'ar',
                'name' => 'عيد الاضحى  ',
            ],
            [
                'id' => '9',
                'offer_list_id' => '5',
                'locale' => 'en',
                'name' =>'January 25th',
            ],
            [
                'id' => '10',
                'offer_list_id' => '5',
                'locale' => 'ar',
                'name' =>'عيد ٢٥ يناير',
            ]]);
    }
}
