<?php

use Illuminate\Database\Seeder;

class FeatureTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feature_translation')->insert([
            [
                //1-View
                'id' => '1',
                'feature_id' => '1',
                'locale' => 'en',
                'name' => 'Garden View',
            ]
            ,
            [
                'id' => '2',
                'feature_id' => '1',
                'locale' => 'ar',
                'name' => 'حديقة ',
            ]
            ,
            [
                'id' => '3',
                'feature_id' => '2',
                'locale' => 'en',
                'name' => 'Land Scape View',
            ]
            ,
            [
                'id' => '4',
                'feature_id' => '2',
                'locale' => 'ar',
                'name' => 'مطل على الجبال '
            ]
            ,
            [
                'id' => '5',
                'feature_id' => '3',
                'locale' => 'en',
                'name' => 'Sea View',
            ]
            ,
            [
                'id' => '6',
                'feature_id' => '3',
                'locale' => 'ar',
                'name' => ' مطل على البحر',
            ]
            ,
            [
                'id' => '7',
                'feature_id' => '4',
                'locale' => 'en',
                'name' =>'Beach View',
            ]
            ,
            [
                'id' => '8',
                'feature_id' => '4',
                'locale' => 'ar',
                'name' => 'شاطئ  ',
            ]
            ,
            [
                'id' => '9',
                'feature_id' => '5',
                'locale' => 'en',
                'name' =>'Swimming Pool View',
            ]
            ,
            [
                'id' => '10',
                'feature_id' => '5',
                'locale' => 'ar',
                'name' =>' حمام سباحة',
            ]
            ,
            [
                'id' => '11',
                'feature_id' => '6',
                'locale' => 'en',
                'name' =>'No View',
            ]
            ,
            [
                'id' => '12',
                'feature_id' => '6',
                'locale' => 'ar',
                'name' =>'بدون إطلاله',
            ]

            //setup
            ,

            //4-outdoor_facilities
            [
                'id' => '39',
                'feature_id' => '20',
                'locale' => 'en',
                'name' => 'On Site Parking',
            ]
            ,
            [
                'id' => '40',
                'feature_id' => '20',
                'locale' => 'ar',
                'name' => ' جراج سيارات',
            ]
            ,
            [
                'id' => '41',
                'feature_id' => '21',
                'locale' => 'en',
                'name' => 'Out Door Pool',
            ]
            ,
            [
                'id' => '42',
                'feature_id' => '21',
                'locale' => 'ar',
                'name' => 'حمام سباحة ',
            ]
            ,
            [
                'id' => '43',
                'feature_id' => '22',
                'locale' => 'en',
                'name' => 'Kids Area',
            ]
            ,
            [
                'id' => '44',
                'feature_id' => '22',
                'locale' => 'ar',
                'name' => 'ملاهي أطفال',
            ]
            ,
            [
                'id' => '45',
                'feature_id' => '23',
                'locale' => 'en',
                'name' =>'Resturant',
            ]
            ,
            [
                'id' => '46',
                'feature_id' => '23',
                'locale' => 'ar',
                'name' => 'مطعم',
            ]
            ,
            [
                'id' => '47',
                'feature_id' => '24',
                'locale' => 'en',
                'name' =>'Bar\Lounge',
            ]
            ,
            [
                'id' => '48',
                'feature_id' => '24',
                'locale' => 'ar',
                'name' =>'بار \ استراحة',
            ]
            ,
            [
                'id' => '49',
                'feature_id' => '25',
                'locale' => 'en',
                'name' =>'Dance Floor',
            ]
            ,
            [
                'id' => '50',
                'feature_id' => '25',
                'locale' => 'ar',
                'name' =>' رقص ',
            ]
            ,
            [
                'id' => '51',
                'feature_id' => '26',
                'locale' => 'en',
                'name' =>'Front of Beach ',
            ]
            ,
            [
                'id' => '52',
                'feature_id' => '26',
                'locale' => 'ar',
                'name' =>'أمام الشاطئ',
            ]
            ,
            [
                'id' => '53',
                'feature_id' => '27',
                'locale' => 'en',
                'name' =>'Buffet Area',
            ]
            ,
            [
                'id' => '54',
                'feature_id' => '27',
                'locale' => 'ar',
                'name' =>' البوفية',
            ]
            ,
            [
                'id' => '55',
                'feature_id' => '28',
                'locale' => 'en',
                'name' =>'Bride Room',
            ]
            ,
            [
                'id' => '56',
                'feature_id' => '28',
                'locale' => 'ar',
                'name' =>'غرفة عرائس ',
            ]
            ,
            [
                'id' => '57',
                'feature_id' => '29',
                'locale' => 'en',
                'name' =>'Terrace ',
            ]
            ,
            [
                'id' => '58',
                'feature_id' => '29',
                'locale' => 'ar',
                'name' =>'تراس ',
            ]
            ,
            [
                'id' => '59',
                'feature_id' => '30',
                'locale' => 'en',
                'name' =>'Spa ',
            ]
            ,
            [
                'id' => '60',
                'feature_id' => '30',
                'locale' => 'ar',
                'name' =>'سبا',
            ]
            ,
            [
                'id' => '61',
                'feature_id' => '31',
                'locale' => 'en',
                'name' =>'Private Bath Room ',
            ]
            ,
            [
                'id' => '62',
                'feature_id' => '31',
                'locale' => 'ar',
                'name' =>' حمام خاص',
            ]
            ,
            [
                'id' => '63',
                'feature_id' => '32',
                'locale' => 'en',
                'name' =>' Reciption',
            ]
            ,
            [
                'id' => '64',
                'feature_id' => '32',
                'locale' => 'ar',
                'name' =>'استقبال ',
            ]
            ,
            [
                'id' => '65',
                'feature_id' => '33',
                'locale' => 'en',
                'name' =>'Garden ',
            ]
            ,
            [
                'id' => '66',
                'feature_id' => '33',
                'locale' => 'ar',
                'name' =>'حديقة ',
            ]
            ,
            //5-indoor Facilties
            [
                'id' => '67',
                'feature_id' => '34',
                'locale' => 'en',
                'name' =>'Internet ',
            ]
            ,
            [
                'id' => '68',
                'feature_id' => '34',
                'locale' => 'ar',
                'name' =>'انترنت ',
            ]
            ,
            [
                'id' => '69',
                'feature_id' => '35',
                'locale' => 'en',
                'name' =>'Air-Condition ',
            ]
            ,
            [
                'id' => '70',
                'feature_id' => '35',
                'locale' => 'ar',
                'name' =>'مكيف هواء ',
            ]
            ,
            [
                'id' => '71',
                'feature_id' => '36',
                'locale' => 'en',
                'name' =>'TV ',
            ]
            ,
            [
                'id' => '72',
                'feature_id' => '36',
                'locale' => 'ar',
                'name' =>'تلفزيون ',
            ]
            ,
            [
                'id' => '73',
                'feature_id' => '37',
                'locale' => 'en',
                'name' =>'Projector ',
            ]
            ,
            [
                'id' => '74',
                'feature_id' => '37',
                'locale' => 'ar',
                'name' =>'شاشة عرض  كبيرة',
            ]
            ,
            [
                'id' => '75',
                'feature_id' => '38',
                'locale' => 'en',
                'name' =>'Tea\Cofee Maker ',
            ]
            ,
            [
                'id' => '76',
                'feature_id' => '38',
                'locale' => 'ar',
                'name' =>'ماكينة عمل شاي /قهوة ',
            ]
            ,
            [
                'id' => '77',
                'feature_id' => '39',
                'locale' => 'en',
                'name' =>'Sound Insulator ',
            ]
            ,
            [
                'id' => '78',
                'feature_id' => '39',
                'locale' => 'ar',
                'name' =>'عازل  صوت',
            ]
            ,
            [
                'id' => '79',
                'feature_id' => '40',
                'locale' => 'en',
                'name' =>'Flip Chart ',
            ]
            ,
            [
                'id' => '80',
                'feature_id' => '40',
                'locale' => 'ar',
                'name' =>'مسند ورقي ',
            ]
            ,
            [
                'id' => '81',
                'feature_id' => '41',
                'locale' => 'en',
                'name' =>'Stationary ',
            ]
            ,
            [
                'id' => '82',
                'feature_id' => '41',
                'locale' => 'ar',
                'name' =>'مثبت  ',
            ]
            ,
            [
                'id' => '83',
                'feature_id' => '42',
                'locale' => 'en',
                'name' =>'Snacks ',
            ]
            ,
            [
                'id' => '84',
                'feature_id' => '42',
                'locale' => 'ar',
                'name' =>'مقرمشات ',
            ]
            ,
            [
                'id' => '85',
                'feature_id' => '43',
                'locale' => 'en',
                'name' =>'Audio\Videio System ',
            ]
            ,
            [
                'id' => '86',
                'feature_id' => '43',
                'locale' => 'ar',
                'name' =>'منظم الصوت / الفيديو ',
            ],
            //FoodType
            [
                'id' => '87',
                'feature_id' => '44',
                'locale' => 'en',
                'name' =>'Foods ',
            ]
            ,
            [
                'id' => '88',
                'feature_id' => '44',
                'locale' => 'ar',
                'name' =>'الأطعمة ',
            ]
            ,
            [
                'id' => '89',
                'feature_id' => '45',
                'locale' => 'en',
                'name' =>'Desserts ',
            ]
            ,
            [
                'id' => '90',
                'feature_id' => '45',
                'locale' => 'ar',
                'name' =>'الحلويات ',
            ]
            ,
            [
                'id' => '91',
                'feature_id' => '46',
                'locale' => 'en',
                'name' =>'Drinks ',
            ]
            ,
            [
                'id' => '92',
                'feature_id' => '46',
                'locale' => 'ar',
                'name' =>'مشروبات',
            ]
            ]);
    }
}
