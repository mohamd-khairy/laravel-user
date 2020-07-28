<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AskCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ask_categories')->insert([
            [
                'id' => '1',
            ],
            [
                'id' => '2',
            ],
            [
                'id' => '3',
            ]
        ]);

        DB::table('ask_category_translations')->insert([
            [
                'id' => '1',
                'ask_category_id' => '1',
                'locale' => 'en',
                'name' => 'reservations',
            ],
            [
                'id' => '2',
                'ask_category_id' => '1',
                'locale' => 'ar',
                'name' => 'الحجوزات',
            ],
            [
                'id' => '3',
                'ask_category_id' => '2',
                'locale' => 'en',
                'name' => 'cancellation',
            ],
            [
                'id' => '4',
                'ask_category_id' => '2',
                'locale' => 'ar',
                'name' => 'الغاء الحجز',
            ],
            [
                'id' => '5',
                'ask_category_id' => '3',
                'locale' => 'en',
                'name' => 'vendor help',
            ],
            [
                'id' => '6',
                'ask_category_id' => '3',
                'locale' => 'ar',
                'name' => 'الدعم',
            ]
        ]);
    }
}
