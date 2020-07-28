<?php

use Illuminate\Database\Seeder;

class BusinessTypeTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_type_translation')->insert([
            [
                'id' => '1',
                'business_type_id' => '1',
                'locale' => 'en',
                'name' => 'Places',
            ],
            [
                'id' => '2',
                'business_type_id' => '1',
                'locale' => 'ar',
                'name' => 'الأماكن',
            ],
            [
                'id' => '3',
                'business_type_id' => '2',
                'locale' => 'en',
                'name' => 'Food & Beverages',
            ],
            [
                'id' => '4',
                'business_type_id' => '2',
                'locale' => 'ar',
                'name' => 'طعام ومشروبات',
            ],
            [
                'id' => '5',
                'business_type_id' => '3',
                'locale' => 'en',
                'name' => 'Party Equipment',
            ],
            [
                'id' => '6',
                'business_type_id' => '3',
                'locale' => 'ar',
                'name' => 'تجهيزات حفلات',
            ],
            [
                'id' => '7',
                'business_type_id' => '4',
                'locale' => 'en',
                'name' =>'Clothes&Fashion',
            ],
            [
                'id' => '8',
                'business_type_id' => '4',
                'locale' => 'ar',
                'name' => 'الازياء والموضة',
            ],
            [
                'id' => '9',
                'business_type_id' => '5',
                'locale' => 'en',
                'name' => 'Cars & Transportation',
            ],
            [
                'id' => '10',
                'business_type_id' => '5',
                'locale' => 'ar',
                'name' => 'مواصلات',
            ],
            [
                'id' => '11',
                'business_type_id' => '6',
                'locale' => 'en',
                'name' => 'Art',
            ],
            [
                'id' => '12',
                'business_type_id' => '6',
                'locale' => 'ar',
                'name' => 'الفنون',
            ],
            [
                'id' => '13',
                'business_type_id' => '7',
                'locale' => 'en',
                'name' => 'Gifts and Accessories',
            ],
            [
                'id' => '14',
                'business_type_id' => '7',
                'locale' => 'ar',
                'name' => 'هداايا واكسسوار',
            ],
            [
                'id' => '15',
                'business_type_id' => '8',
                'locale' => 'en',
                'name' => 'Variety Services',
            ],
            [
                'id' => '16',
                'business_type_id' => '8',
                'locale' => 'ar',
                'name' => 'خدمات متنوعة',
            ],
                //Places
             [
                'id' => '17',
                'business_type_id' => '9',
                'locale' => 'en',
                'name' => 'Hotels',
            ],

             [
                'id' => '18',
                'business_type_id' => '9',
                'locale' => 'ar',
                'name' => 'فنادق',
            ], [
                'id' => '19',
                'business_type_id' => '10',
                'locale' => 'en',
                'name' => 'Conferences and Exhibitions',
            ], [
                'id' => '20',
                'business_type_id' => '10',
                'locale' => 'ar',
                'name' => 'مؤتمرات ومعارض',
            ], [
                'id' => '21',
                'business_type_id' => '11',
                'locale' => 'en',
                'name' => 'Event Halls',
            ], [
                'id' => '22',
                'business_type_id' => '11',
                'locale' => 'ar',
                'name' => 'قاعات مناسبات',
            ],
            [
                'id' => '23',
                'business_type_id' => '12',
                'locale' => 'en',
                'name' => 'Theaters',
            ],

             [
                'id' => '24',
                'business_type_id' => '12',
                'locale' => 'ar',
                'name' => 'مسارح',
            ], [
                'id' => '25',
                'business_type_id' => '13',
                'locale' => 'en',
                'name' => 'Breaks',
            ], [
                'id' => '26',
                'business_type_id' => '13',
                'locale' => 'ar',
                'name' => 'استراحات ',
            ], [
                'id' => '27',
                'business_type_id' => '14',
                'locale' => 'en',
                'name' => 'Palaces and villas',
            ], [
                'id' => '28',
                'business_type_id' => '14',
                'locale' => 'ar',
                'name' => 'قصور وفيلل',
            ]
            , [
                'id' => '29',
                'business_type_id' => '15',
                'locale' => 'en',
                'name' => 'Religious halls',
            ], [
                'id' => '30',
                'business_type_id' => '15',
                'locale' => 'ar',
                'name' => 'قاعات دينية',
            ]

            , [
                'id' => '31',
                'business_type_id' => '16',
                'locale' => 'en',
                'name' => 'Meeting rooms',
            ], [
                'id' => '32',
                'business_type_id' => '16',
                'locale' => 'ar',
                'name' => 'قاعات اجتماعات',
            ]

            , [
                'id' => '33',
                'business_type_id' => '17',
                'locale' => 'en',
                'name' => 'Entertainment halls',
            ], [
                'id' => '34',
                'business_type_id' => '17',
                'locale' => 'ar',
                'name' => 'قاعات ترفيهيه',
            ]
            , [
                'id' => '35',
                'business_type_id' => '18',
                'locale' => 'en',
                'name' => 'Educational halls',
            ], [
                'id' => '36',
                'business_type_id' => '18',
                'locale' => 'ar',
                'name' => 'قاعات تعليمية ',
            ]



            //2 Food and Drinks
            ,
             [
                'id' => '37',
                'business_type_id' => '19',
                'locale' => 'en',
                'name' => 'Restaurants',
            ],

             [
                'id' => '38',
                'business_type_id' => '19',
                'locale' => 'ar',
                'name' => 'مطاعم',
            ], [
                'id' => '39',
                'business_type_id' => '20',
                'locale' => 'en',
                'name' => 'Catering Catering',
            ], [
                'id' => '40',
                'business_type_id' => '20',
                'locale' => 'ar',
                'name' => 'تموين حفلات',
            ], [
                'id' => '41',
                'business_type_id' => '21',
                'locale' => 'en',
                'name' => 'Cooks',
            ], [
                'id' => '42',
                'business_type_id' => '21',
                'locale' => 'ar',
                'name' => 'طباخين',
            ]
            , [
                'id' => '43',
                'business_type_id' => '22',
                'locale' => 'en',
                'name' => 'drinks',
            ], [
                'id' => '44',
                'business_type_id' => '22',
                'locale' => 'ar',
                'name' => 'مشروبات',
            ], [
                'id' => '45',
                'business_type_id' => '23',
                'locale' => 'en',
                'name' => 'Candy',
            ], [
                'id' => '46',
                'business_type_id' => '23',
                'locale' => 'ar',
                'name' => 'حلويات',
            ]
            //3 Party Equipment
            ,
             [
                'id' => '47',
                'business_type_id' => '24',
                'locale' => 'en',
                'name' => 'Decor',
            ],

             [
                'id' => '48',
                'business_type_id' => '24',
                'locale' => 'ar',
                'name' => 'ديكور',
            ], [
                'id' => '49',
                'business_type_id' => '25',
                'locale' => 'en',
                'name' => 'Kush',
            ], [
                'id' => '50',
                'business_type_id' => '25',
                'locale' => 'ar',
                'name' => 'كوش',
            ], [
                'id' => '51',
                'business_type_id' => '26',
                'locale' => 'en',
                'name' => 'Audio System',
            ], [
                'id' => '52',
                'business_type_id' => '26',
                'locale' => 'ar',
                'name' => 'سمعيات',
            ]
            ,
             [
                'id' => '53',
                'business_type_id' => '27',
                'locale' => 'en',
                'name' => 'Audio-visual effects',
            ],

             [
                'id' => '54',
                'business_type_id' => '27',
                'locale' => 'ar',
                'name' => 'مؤثرات سمعية وبصرية',
            ], [
                'id' => '55',
                'business_type_id' => '28',
                'locale' => 'en',
                'name' => 'illumination',
            ], [
                'id' => '56',
                'business_type_id' => '28',
                'locale' => 'ar',
                'name' => 'اضاءة',
            ], [
                'id' => '57',
                'business_type_id' => '29',
                'locale' => 'en',
                'name' => 'fireworks',
            ], [
                'id' => '58',
                'business_type_id' => '29',
                'locale' => 'ar',
                'name' => 'العاب  نارية',
            ]
            ,
             [
                'id' => '59',
                'business_type_id' => '30',
                'locale' => 'en',
                'name' => 'Laser Shows',
            ],

             [
                'id' => '60',
                'business_type_id' => '30',
                'locale' => 'ar',
                'name' => 'عروض ليزر ',
            ]
            ,
             [
                'id' => '61',
                'business_type_id' => '31',
                'locale' => 'en',
                'name' => 'Flowering equipment',
            ],

             [
                'id' => '62',
                'business_type_id' => '31',
                'locale' => 'ar',
                'name' => 'تجهيزات ورود',
            ]
            ,
             [
                'id' => '63',
                'business_type_id' => '32',
                'locale' => 'en',
                'name' => 'Wedding Cards',
            ],

             [
                'id' => '64',
                'business_type_id' => '32',
                'locale' => 'ar',
                'name' => 'كروت افراح ',
            ]
            ,
             [
                'id' => '65',
                'business_type_id' => '33',
                'locale' => 'en',
                'name' => 'Promotions and announcement',
            ],

             [
                'id' => '66',
                'business_type_id' => '33',
                'locale' => 'ar',
                'name' => 'دعايا واعلان',
            ]
            ,
             [
                'id' => '67',
                'business_type_id' => '34',
                'locale' => 'en',
                'name' => 'Photography & Editing',
            ],

             [
                'id' => '68',
                'business_type_id' => '34',
                'locale' => 'ar',
                'name' => 'تصوير و مونتاج',
            ]
            //4 Clothes&Fashion
            ,
             [
                'id' => '69',
                'business_type_id' => '35',
                'locale' => 'en',
                'name' => 'Fashion and dresses',
            ],

             [
                'id' => '70',
                'business_type_id' => '35',
                'locale' => 'ar',
                'name' => 'ازياء وفساتين ',
            ], [
                'id' => '71',
                'business_type_id' => '36',
                'locale' => 'en',
                'name' => 'Skin and body care',
            ], [
                'id' => '72',
                'business_type_id' => '36',
                'locale' => 'ar',
                'name' => 'العناية بالبشرة والجسم',
            ], [
                'id' => '73',
                'business_type_id' => '37',
                'locale' => 'en',
                'name' => 'Hair and makeup',
            ], [
                'id' => '74',
                'business_type_id' => '37',
                'locale' => 'ar',
                'name' => 'شعر ومكياج',
            ]
            , [
                'id' => '75',
                'business_type_id' => '38',
                'locale' => 'en',
                'name' => 'Accessories',
            ], [
                'id' => '76',
                'business_type_id' => '38',
                'locale' => 'ar',
                'name' => 'اكسسوارت',
            ]
            //5 Transportation
            ,
             [
                'id' => '77',
                'business_type_id' => '39',
                'locale' => 'en',
                'name' => 'Limousine and wedding cars',
            ],

             [
                'id' => '78',
                'business_type_id' => '39',
                'locale' => 'ar',
                'name' => 'ليموزين وسيارات زفاف',
            ], [
                'id' => '79',
                'business_type_id' => '40',
                'locale' => 'en',
                'name' => 'Buses',
            ], [
                'id' => '80',
                'business_type_id' => '40',
                'locale' => 'ar',
                'name' => 'اتوبيسات',
            ], [
                'id' => '81',
                'business_type_id' => '41',
                'locale' => 'en',
                'name' => 'Delivery services',
            ], [
                'id' => '82',
                'business_type_id' => '41',
                'locale' => 'ar',
                'name' => 'خدمات توصيل',
            ]
            //6 Art
            ,
             [
                'id' => '83',
                'business_type_id' => '42',
                'locale' => 'en',
                'name' => 'DJ music',
            ],

             [
                'id' => '84',
                'business_type_id' => '42',
                'locale' => 'ar',
                'name' => 'موسيقى DJ',
            ], [
                'id' => '85',
                'business_type_id' => '43',
                'locale' => 'en',
                'name' => 'musical band',
            ], [
                'id' => '86',
                'business_type_id' => '43',
                'locale' => 'ar',
                'name' => 'فرق موسيقية',
            ], [
                'id' => '87',
                'business_type_id' => '44',
                'locale' => 'en',
                'name' => 'dancing',
            ], [
                'id' => '88',
                'business_type_id' => '44',
                'locale' => 'ar',
                'name' => 'رقص ',
            ]
            , [
                'id' => '89',
                'business_type_id' => '45',
                'locale' => 'en',
                'name' => 'Singers',
            ], [
                'id' => '90',
                'business_type_id' => '45',
                'locale' => 'ar',
                'name' => 'مطربين',
            ]
            , [
                'id' => '91',
                'business_type_id' => '46',
                'locale' => 'en',
                'name' => 'SHOWS',
            ], [
                'id' => '92',
                'business_type_id' => '46',
                'locale' => 'ar',
                'name' => 'عروض',
            ]

            //7 Gifts and accessories
            ,
             [
                'id' => '93',
                'business_type_id' => '47',
                'locale' => 'en',
                'name' => 'stationery tools',
            ],

             [
                'id' => '94',
                'business_type_id' => '47',
                'locale' => 'ar',
                'name' => 'ادوات مكتبية',
            ], [
                'id' => '95',
                'business_type_id' => '48',
                'locale' => 'en',
                'name' => 'Roses',
            ], [
                'id' => '96',
                'business_type_id' => '48',
                'locale' => 'ar',
                'name' => 'ورود',
            ], [
                'id' => '97',
                'business_type_id' => '49',
                'locale' => 'en',
                'name' => 'Packaging',
            ], [
                'id' => '98',
                'business_type_id' => '49',
                'locale' => 'ar',
                'name' => 'تغليف',
            ]

            //8 Variety Services
            ,
             [
                'id' => '99',
                'business_type_id' => '50',
                'locale' => 'en',
                'name' => 'Translators',
            ],

             [
                'id' => '100',
                'business_type_id' => '50',
                'locale' => 'ar',
                'name' => 'مترجمين',
            ], [
                'id' => '101',
                'business_type_id' => '51',
                'locale' => 'en',
                'name' => 'Marriage officiant',
            ], [
                'id' => '102',
                'business_type_id' => '51',
                'locale' => 'ar',
                'name' => 'مأذون',
            ], [
                'id' => '103',
                'business_type_id' => '52',
                'locale' => 'en',
                'name' => 'Social Media Filters',
            ], [
                'id' => '104',
                'business_type_id' => '52',
                'locale' => 'ar',
                'name' => 'فلاتر سوشيال ميديا',
            ]
            ,
            [
               'id' => '105',
               'business_type_id' => '53',
               'locale' => 'en',
               'name' => 'Influencers',
           ],

            [
               'id' => '106',
               'business_type_id' => '53',
               'locale' => 'ar',
               'name' => 'انفلونسرز',
           ], [
               'id' => '107',
               'business_type_id' => '54',
               'locale' => 'en',
               'name' => 'Models',
           ], [
               'id' => '108',
               'business_type_id' => '54',
               'locale' => 'ar',
               'name' => 'موديلز',
           ], [
               'id' => '109',
               'business_type_id' => '55',
               'locale' => 'en',
               'name' => 'Event organizers',
           ], [
               'id' => '110',
               'business_type_id' => '55',
               'locale' => 'ar',
               'name' => 'منظمين مناسبات',
           ]
           ,
           [
              'id' => '111',
              'business_type_id' => '56',
              'locale' => 'en',
              'name' => 'Workers',
          ],

           [
              'id' => '112',
              'business_type_id' => '56',
              'locale' => 'ar',
              'name' => 'عماله',
          ], [
              'id' => '113',
              'business_type_id' => '57',
              'locale' => 'en',
              'name' => 'Food Bank',
          ], [
              'id' => '114',
              'business_type_id' => '57',
              'locale' => 'ar',
              'name' => 'بنك الطعام',
          ]
          /*


          */
/////////////Sub Category Of Place/*Entertainment halls*////////////////////////////////////
            , [
                'id' => '115',
                'business_type_id' => '58',
                'locale' => 'en',
                'name' => 'Beaches',
            ], [
                'id' => '116',
                'business_type_id' => '58',
                'locale' => 'ar',
                'name' => 'شواطئ ',
            ]
            , [
                'id' => '117',
                'business_type_id' => '59',
                'locale' => 'en',
                'name' => 'gardens',
            ], [
                'id' => '118',
                'business_type_id' => '59',
                'locale' => 'ar',
                'name' => 'حدائق ',
            ], [
                'id' => '119',
                'business_type_id' => '60',
                'locale' => 'en',
                'name' => 'Restaurants',
            ], [
                'id' => '120',
                'business_type_id' => '60',
                'locale' => 'ar',
                'name' => 'مطاعم  ',
            ], [
                'id' => '121',
                'business_type_id' => '61',
                'locale' => 'en',
                'name' => 'Ships / Boats',
            ], [
                'id' => '122',
                'business_type_id' => '61',
                'locale' => 'ar',
                'name' => 'سفن/مراكب ',
            ], [
                'id' => '123',
                'business_type_id' => '62',
                'locale' => 'en',
                'name' => 'Malls and Markets',
            ], [
                'id' => '124',
                'business_type_id' => '62',
                'locale' => 'ar',
                'name' => 'مولات واسواق ',
            ]
 /////////////Sub Category Of Place/*Educational halls*////////////////////////////////////
            , [
                'id' => '125',
                'business_type_id' => '63',
                'locale' => 'en',
                'name' => 'Hospitals',
            ], [
                'id' => '126',
                'business_type_id' => '63',
                'locale' => 'ar',
                'name' => 'مستشفيات  ',
            ], [
                'id' => '127',
                'business_type_id' => '64',
                'locale' => 'en',
                'name' => 'Universities',
            ], [
                'id' => '128',
                'business_type_id' => '64',
                'locale' => 'ar',
                'name' => 'جامعات ',
            ], [
                'id' => '129',
                'business_type_id' => '65',
                'locale' => 'en',
                'name' => 'Schools',
            ], [
                'id' => '130',
                'business_type_id' => '65',
                'locale' => 'ar',
                'name' => 'مدارس ',
            ], [
                'id' => '131',
                'business_type_id' => '66',
                'locale' => 'en',
                'name' => ' Government halls',
            ], [
                'id' => '132',
                'business_type_id' => '66',
                'locale' => 'ar',
                'name' => ' قاعات حكومية ',
            ]
 /////////////Sub Category Of ART/*Shows*////////////////////////////////////
            , [
                'id' => '133',
                'business_type_id' => '67',
                'locale' => 'en',
                'name' => 'Kids show teams',
            ], [
                'id' => '134',
                'business_type_id' => '67',
                'locale' => 'ar',
                'name' => 'فرق استعراضية للاطفال  ',
            ]
            , [
                'id' => '135',
                'business_type_id' => '68',
                'locale' => 'en',
                'name' => 'Acrobats',
            ], [
                'id' => '136',
                'business_type_id' => '68',
                'locale' => 'ar',
                'name' => 'بهلوانات',
            ]
            , [
                'id' => '137',
                'business_type_id' => '69',
                'locale' => 'en',
                'name' => 'Animal Shows',
            ], [
                'id' => '138',
                'business_type_id' => '69',
                'locale' => 'ar',
                'name' => 'عروض حيوانات ',
            ]
            , [
                'id' => '139',
                'business_type_id' => '70',
                'locale' => 'en',
                'name' => 'Folk Dance',
            ], [
                'id' => '140',
                'business_type_id' => '70',
                'locale' => 'ar',
                'name' => 'رقص شعبي ',
            ]
            , [
                'id' => '141',
                'business_type_id' => '71',
                'locale' => 'en',
                'name' => 'cabriolet',
            ], [
                'id' => '142',
                'business_type_id' => '71',
                'locale' => 'ar',
                'name' => 'حنطور ',
            ]
            , [
                'id' => '143',
                'business_type_id' => '72',
                'locale' => 'en',
                'name' => 'poetry',
            ], [
                'id' => '144',
                'business_type_id' => '72',
                'locale' => 'ar',
                'name' => 'اشعار ',
            ]
            /**
             *
             */
/////////////Sub Category Of Variety Services/* Influencers *////////////////////////////////////
            , [
                'id' => '145',
                'business_type_id' => '73',
                'locale' => 'en',
                'name' => 'Journalists',
            ], [
                'id' => '146',
                'business_type_id' => '73',
                'locale' => 'ar',
                'name' => 'صحفيين ',
            ], [
                'id' => '147',
                'business_type_id' => '74',
                'locale' => 'en',
                'name' => 'Snappers',
            ], [
                'id' => '148',
                'business_type_id' => '74',
                'locale' => 'ar',
                'name' => 'سنابيين ',
            ], [
                'id' => '149',
                'business_type_id' => '75',
                'locale' => 'en',
                'name' => 'Fashionista',
            ], [
                'id' => '150',
                'business_type_id' => '75',
                'locale' => 'ar',
                'name' => 'فاشونيستا ',
            ], [
                'id' => '151',
                'business_type_id' => '76',
                'locale' => 'en',
                'name' => 'Critics',
            ], [
                'id' => '152',
                'business_type_id' => '76',
                'locale' => 'ar',
                'name' => 'نقاد ',
            ]
            , [
                'id' => '153',
                'business_type_id' => '77',
                'locale' => 'en',
                'name' => 'Socialist',
            ], [
                'id' => '154',
                'business_type_id' => '77',
                'locale' => 'ar',
                'name' => 'اعلاميين ',
            ]
            , [
                'id' => '155',
                'business_type_id' => '78',
                'locale' => 'en',
                'name' => 'Public Persons',
            ], [
                'id' => '156',
                'business_type_id' => '78',
                'locale' => 'ar',
                'name' => 'شخصيات عامة ',
            ]



        ]);
    }
}
