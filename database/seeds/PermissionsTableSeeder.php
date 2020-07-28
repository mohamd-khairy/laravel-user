<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '18',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '19',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '20',
                'title' => 'user_alert_access',
            ],
            [
                'id'    => '21',
                'title' => 'feature_create',
            ],
            [
                'id'    => '22',
                'title' => 'feature_edit',
            ],
            [
                'id'    => '23',
                'title' => 'feature_delete',
            ],
            [
                'id'    => '24',
                'title' => 'feature_access',
            ],
            [
                'id'    => '25',
                'title' => 'setup_create',
            ],
            [
                'id'    => '26',
                'title' => 'setup_edit',
            ],
            [
                'id'    => '27',
                'title' => 'setup_delete',
            ],
            [
                'id'    => '28',
                'title' => 'setup_access',
            ],
            [
                'id'    => '29',
                'title' => 'view_create',
            ],
            [
                'id'    => '30',
                'title' => 'view_edit',
            ],
            //            [
            //                'id'    => '31',
            //                'title' => 'view_show',
            //            ],
            [
                'id'    => '32',
                'title' => 'view_delete',
            ],
            [
                'id'    => '33',
                'title' => 'view_access',
            ],
            [
                'id'    => '34',
                'title' => 'provider_edit',
            ],
            [
                'id'    => '35',
                'title' => 'provider_show',
            ],
            [
                'id'    => '36',
                'title' => 'provider_delete',
            ],
            [
                'id'    => '37',
                'title' => 'provider_access',
            ],
            //            [
            //                'id'    => '38',
            //                'title' => 'service_create',
            //            ],
            //            [
            //                'id'    => '39',
            //                'title' => 'service_edit',
            //            ],
            //            [
            //                'id'    => '40',
            //                'title' => 'service_show',
            //            ],
            //            [
            //                'id'    => '41',
            //                'title' => 'service_delete',
            //            ],
            //            [
            //                'id'    => '42',
            //                'title' => 'service_access',
            //            ],
            [
                'id'    => '43',
                'title' => 'facilities_indoor_create',
            ],
            [
                'id'    => '44',
                'title' => 'facilities_indoor_edit',
            ],
            [
                'id'    => '45',
                'title' => 'facilities_indoor_delete',
            ],
            [
                'id'    => '46',
                'title' => 'facilities_indoor_access',
            ],
            [
                'id'    => '47',
                'title' => 'facilities_outdoor_create',
            ],
            [
                'id'    => '48',
                'title' => 'facilities_outdoor_edit',
            ],
            [
                'id'    => '49',
                'title' => 'facilities_outdoor_delete',
            ],
            [
                'id'    => '50',
                'title' => 'facilities_outdoor_access',
            ],
            [
                'id'    => '51',
                'title' => 'food_type_create',
            ],
            [
                'id'    => '52',
                'title' => 'food_type_edit',
            ],
            [
                'id'    => '53',
                'title' => 'food_type_delete',
            ],
            [
                'id'    => '54',
                'title' => 'food_type_access',
            ],
            [
                'id'    => '55',
                'title' => 'service_place_create',
            ],
            [
                'id'    => '56',
                'title' => 'service_place_edit',
            ],
            [
                'id'    => '57',
                'title' => 'service_place_show',
            ],
            [
                'id'    => '58',
                'title' => 'service_place_delete',
            ],
            [
                'id'    => '59',
                'title' => 'service_place_access',
            ],
            [
                'id'    => '60',
                'title' => 'service_food_create',
            ],
            [
                'id'    => '61',
                'title' => 'service_food_edit',
            ],
            [
                'id'    => '62',
                'title' => 'service_food_show',
            ],
            [
                'id'    => '63',
                'title' => 'service_food_delete',
            ],
            [
                'id'    => '64',
                'title' => 'service_food_access',
            ],
            [
                'id'    => '65',
                'title' => 'provider_user_create',
            ],
            [
                'id'    => '66',
                'title' => 'provider_user_edit',
            ],
            [
                'id'    => '67',
                'title' => 'provider_user_show',
            ],
            [
                'id'    => '68',
                'title' => 'provider_user_delete',
            ],
            [
                'id'    => '69',
                'title' => 'provider_user_access',
            ],
            [
                'id'    => '70',
                'title' => 'document_type_create',
            ],
            [
                'id'    => '71',
                'title' => 'document_type_edit',
            ],
            [
                'id'    => '72',
                'title' => 'document_type_delete',
            ],
            [
                'id'    => '73',
                'title' => 'document_type_access',
            ],
            [
                'id'    => '74',
                'title' => 'providerligal_info_create',
            ],
            [
                'id'    => '75',
                'title' => 'providerligal_info_edit',
            ],
            [
                'id'    => '76',
                'title' => 'providerligal_info_show',
            ],
            [
                'id'    => '77',
                'title' => 'providerligal_info_delete',
            ],
            [
                'id'    => '78',
                'title' => 'providerligal_info_access',
            ],
            [
                'id'    => '79',
                'title' => 'city_create',
            ],
            [
                'id'    => '80',
                'title' => 'city_edit',
            ],
            [
                'id'    => '81',
                'title' => 'city_delete',
            ],
            [
                'id'    => '82',
                'title' => 'city_access',
            ],
            [
                'id'    => '83',
                'title' => 'neighborhood_create',
            ],
            [
                'id'    => '84',
                'title' => 'neighborhood_edit',
            ],
            [
                'id'    => '85',
                'title' => 'neighborhood_delete',
            ],
            [
                'id'    => '86',
                'title' => 'neighborhood_access',
            ],
            [
                'id'    => '87',
                'title' => 'blog_create',
            ],
            [
                'id'    => '88',
                'title' => 'blog_edit',
            ],
            [
                'id'    => '89',
                'title' => 'blog_delete',
            ],
            [
                'id'    => '90',
                'title' => 'blog_access',
            ],
            [
                'id'    => '91',
                'title' => 'nav_bar_create',
            ],
            [
                'id'    => '92',
                'title' => 'nav_bar_edit',
            ],
            [
                'id'    => '93',
                'title' => 'nav_bar_delete',
            ],
            [
                'id'    => '94',
                'title' => 'nav_bar_access',
            ],
            [
                'id'    => '95',
                'title' => 'category_create',
            ],
            [
                'id'    => '96',
                'title' => 'category_edit',
            ],
            [
                'id'    => '97',
                'title' => 'category_delete',
            ],
            [
                'id'    => '98',
                'title' => 'category_access',
            ],
            [
                'id'    => '99',
                'title' => 'sub_category_create',
            ],
            [
                'id'    => '100',
                'title' => 'sub_category_edit',
            ],
            [
                'id'    => '101',
                'title' => 'sub_category_show',
            ],
            [
                'id'    => '102',
                'title' => 'sub_category_delete',
            ],
            [
                'id'    => '103',
                'title' => 'sub_category_access',
            ],

            [
                'id'    => '104',
                'title' => 'fith_with_create',
            ],
            [
                'id'    => '105',
                'title' => 'fith_with_edit',
            ],
            [
                'id'    => '106',
                'title' => 'fith_with_delete',
            ],
            [
                'id'    => '107',
                'title' => 'fith_with_access',
            ],
            [
                'id'    => '108',
                'title' => 'servicess_access',
            ],
            [
                'id'    => '109',
                'title' => 'administration_access',
            ],

            [
                'id'    => '110',
                'title' => 'profile_password_edit',
            ],

            [
                'id'    => '111',
                'title' => 'banner_create',
            ],
            [
                'id'    => '112',
                'title' => 'banner_edit',
            ],
            [
                'id'    => '113',
                'title' => 'banner_delete',
            ],
            [
                'id'    => '114',
                'title' => 'banner_access',
            ],

            [
                'id'    => '115',
                'title' => 'ask_category_create',
            ],
            [
                'id'    => '116',
                'title' => 'ask_category_edit',
            ],
            [
                'id'    => '117',
                'title' => 'ask_category_delete',
            ],
            [
                'id'    => '118',
                'title' => 'ask_category_access',
            ],
            [
                'id'    => '119',
                'title' => 'faq_create',
            ],
            [
                'id'    => '120',
                'title' => 'faq_edit',
            ],
            [
                'id'    => '121',
                'title' => 'faq_show',
            ],
            [
                'id'    => '122',
                'title' => 'faq_delete',
            ],
            [
                'id'    => '123',
                'title' => 'faq_access',
            ],
            [
                'id'    => '124',
                'title' => 'contact_us_create',
            ],
            [
                'id'    => '125',
                'title' => 'contact_us_edit',
            ],
            [
                'id'    => '126',
                'title' => 'contact_us_show',
            ],
            [
                'id'    => '127',
                'title' => 'contact_us_delete',
            ],
            [
                'id'    => '128',
                'title' => 'contact_us_access',
            ],
            [
                'id'    => '129',
                'title' => 'static_page_create',
            ],
            [
                'id'    => '130',
                'title' => 'static_page_edit',
            ],
            [
                'id'    => '131',
                'title' => 'static_page_show',
            ],
            [
                'id'    => '132',
                'title' => 'static_page_delete',
            ],
            [
                'id'    => '133',
                'title' => 'static_page_access',
            ],
            [
                'id'    => '134',
                'title' => 'addon_create',
            ],
            [
                'id'    => '135',
                'title' => 'addon_edit',
            ],
            [
                'id'    => '136',
                'title' => 'addon_show',
            ],
            [
                'id'    => '137',
                'title' => 'addon_delete',
            ],
            [
                'id'    => '138',
                'title' => 'addon_access',
            ],
            [
                'id'    => '139',
                'title' => 'profile_password_edit',
            ],



        ];

        Permission::insert($permissions);
    }
}
