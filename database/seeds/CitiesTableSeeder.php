<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->truncate();

        DB::table('cities') ->insert([

                [
                    'id' => 1,
                    'city_key' => 'Cairo Governorate',
                    'city_en' => 'Cairo',
                    'city_ar' => 'محافظة القاهرة',
                    'status' => 0,
                    'order' => 1
                ],
                [
                    'id' => 2,
                    'city_key' => 'Giza Governorate',
                    'city_en' => 'Giza',
                    'city_ar' => 'محافظة الجيزة',
                    'status' => 0,
                    'order' => 2
                ],
                [
                    'id' => 3,
                    'city_key' => 'Alexandria Governorate',
                    'city_en' => 'Alexandria',
                    'city_ar' => 'محافظة الأسكندرية',
                    'status' => 0,
                    'order' => 3
                ],
                [
                    'id' => 4,
                    'city_key' => 'Dakahlia Governorate',
                    'city_en' => 'Dakahlia',
                    'city_ar' => 'محافظة الدقهلية',
                    'status' => 0,
                    'order' => 4
                ],
                [
                    'id' => 5,
                    'city_key' => 'Red Sea Governorate',
                    'city_en' => 'Red Sea',
                    'city_ar' => 'محافظة البحر الأحمر',
                    'status' => 0,
                    'order' => 5
                ],
                [
                    'id' => 6,
                    'city_key' => 'El Beheira Governorate',
                    'city_en' => 'El Beheira',
                    'city_ar' => 'محافظة البحيرة',
                    'status' => 0,
                    'order' => 6
                ],
                [
                    'id' => 7,
                    'city_key' => 'Faiyum Governorate',
                    'city_en' => 'Faiyum',
                    'city_ar' => 'محافظة الفيوم',
                    'status' => 0,
                    'order' => 7
                ],
                [
                    'id' => 8,
                    'city_key' => 'Gharbia Governorate',
                    'city_en' => 'Gharbia',
                    'city_ar' => 'محافظة الغربية',
                    'status' => 0,
                    'order' => 8
                ],
                [
                    'id' => 9,
                    'city_key' => 'Ismailia Governorate',
                    'city_en' => 'Ismailia',
                    'city_ar' => 'محافظة الإسماعلية',
                    'status' => 0,
                    'order' => 9
                ],
                [
                    'id' => 10,
                    'city_key' => 'Menofia Governorate',
                    'city_en' => 'Menofia',
                    'city_ar' => 'محافظة المنوفية',
                    'status' => 0,
                    'order' => 10
                ],
                [
                    'id' => 11,
                    'city_key' => 'Menia Governorate',
                    'city_en' => 'Menia',
                    'city_ar' => 'محافظة المنيا',
                    'status' => 0,
                    'order' => 11
                ],
                [
                    'id' => 12,
                    'city_key' => 'Qaliubiya Governorate',
                    'city_en' => 'Qaliubiya',
                    'city_ar' => 'محافظة القليوبية',
                    'status' => 0,
                    'order' => 12
                ],
                [
                    'id' => 13,
                    'city_key' => 'New Valley Governorate',
                    'city_en' => 'New Valley',
                    'city_ar' => 'محافظة الوادي الجديد',
                    'status' => 0,
                    'order' => 13
                ],
                [
                    'id' => 14,
                    'city_key' => 'Suez Governorate',
                    'city_en' => 'Suez',
                    'city_ar' => 'محافظة السويس',
                    'status' => 0,
                    'order' => 14
                ],
                [
                    'id' => 15,
                    'city_key' => 'Aswan Governorate',
                    'city_en' => 'Aswan',
                    'city_ar' => 'محافظة اسوان',
                    'status' => 0,
                    'order' => 15
                ],
                [
                    'id' => 16,
                    'city_key' => 'Assiut Governorate',
                    'city_en' => 'Assiut',
                    'city_ar' => 'محافظة اسيوط',
                    'status' => 0,
                    'order' => 16
                ],
                [
                    'id' => 17,
                    'city_key' => 'Beni Suef Governorate',
                    'city_en' => 'Beni Suef',
                    'city_ar' => 'محافظة بني سويف',
                    'status' => 0,
                    'order' => 17
                ],
                [
                    'id' => 18,
                    'city_key' => 'Port Said Governorate',
                    'city_en' => 'Port Said',
                    'city_ar' => 'محافظة بورسعيد',
                    'status' => 0,
                    'order' => 18
                ],
                [
                    'id' => 19,
                    'city_key' => 'Damietta Governorate',
                    'city_en' => 'Damietta',
                    'city_ar' => 'محافظة دمياط',
                    'status' => 0,
                    'order' => 19
                ],
                [
                    'id' => 20,
                    'city_key' => 'Sharkia Governorate',
                    'city_en' => 'Sharkia',
                    'city_ar' => 'محافظة الشرقية',
                    'status' => 0,
                    'order' => 20
                ],
                [
                    'id' => 21,
                    'city_key' => 'South Sinai Governorate',
                    'city_en' => 'South Sinai',
                    'city_ar' => 'محافظة جنوب سيناء',
                    'status' => 0,
                    'order' => 21
                ],
                [
                    'id' => 22,
                    'city_key' => 'Kafr Al sheikh Governorate',
                    'city_en' => 'Kafr Al sheikh',
                    'city_ar' => 'محافظة كفر الشيخ',
                    'status' => 0,
                    'order' => 22
                ],
                [
                    'id' => 23,
                    'city_key' => 'Matrouh Governorate',
                    'city_en' => 'Matrouh',
                    'city_ar' => 'محافظة مطروح',
                    'status' => 0,
                    'order' => 23
                ],
                [
                    'id' => 24,
                    'city_key' => 'Luxor Governorate',
                    'city_en' => 'Luxor',
                    'city_ar' => 'محافظة الأقصر',
                    'status' => 0,
                    'order' => 24
                ],
                [
                    'id' => 25,
                    'city_key' => 'Qena Governorate',
                    'city_en' => 'Qena',
                    'city_ar' => 'محافظة قنا',
                    'status' => 0,
                    'order' => 25
                ],
                [
                    'id' => 26,
                    'city_key' => 'North Sinai Governorate',
                    'city_en' => 'North Sinai',
                    'city_ar' => 'محافظة شمال سيناء ',
                    'status' => 0,
                    'order' => 26
                ],
                [
                    'id' => 27,
                    'city_key' => 'Sohag Governorate',
                    'city_en' => 'Sohag',
                    'city_ar' => ' محافظة سوهاج ',
                    'status' => 0,
                    'order' => 27
                ]

        ]);

    }
}

