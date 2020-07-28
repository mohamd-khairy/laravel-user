<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            CountriesTableSeeder::class,
            BusinessTypeTableSeeder::class,
            BusinessTypeTranslationTableSeeder::class,
            DocTypeTableSeeder::class,
            DocTypeTranslationTableSeeder::class,
            FeatureTypeTableSeeder::class,
            FeatureTableSeeder::class,
            FeatureTranslationTableSeeder::class,
            occasionTableDataSeeder::class,
            occasionTranslationTableDataSeeder::class,
            CitiesTableSeeder::class,
            FitsWithTableSeeder::class,
            FitsWithTranslationTableSeeder::class,
            SetupSeeder::class,
            SetupTranslationSeeder::class,
            AskCategorySeed::class,
            // ServiceSearchSeeder::class,
        ]);

        /************************ Provider *******************************/
        $faq = factory('App\Models\Faq', 30)->create();
        $provider = factory('App\Models\ProviderUser')->create();
        $CustomerUser = factory('App\CustomerUser')->create();
        factory('App\Models\provider_address')->create(['type' => 'provider_address', 'foreign_id' => $provider->id]);

        /************************ Services Food *******************************/
        factory('App\Models\Service', 100)->create(['main_category' => 2])
            ->each(function ($u) {
                /** service images */
                // factory('App\Models\Service_Image')->create(['size' => 'large' ,'service_id' => $u->id]);
                // factory('App\Models\Service_Image')->create(['size' => 'medium' ,'service_id' => $u->id]);
                // factory('App\Models\Service_Image')->create(['size' => 'small' ,'service_id' => $u->id]);

                /** service addons */
                factory('App\Models\ServiceAddons')->create(['service_id' => $u->id]);

                /** service packages */
                factory('App\Models\ServicePackages')->create(['service_id' => $u->id]);

                /** service fitsWith */
                factory('App\Models\ServiceFitsWith')->create(['service_id' => $u->id]);

                /** service food */
                factory('App\Models\ServiceFood')->create(['service_id' => $u->id]);

                /** service fitsWith */
                factory('App\Models\ServiceFeature')->create(['service_id' => $u->id]);

                /** service address */
                factory('App\Models\provider_address')->create([
                    'type' => 'food_address',
                    'foreign_id' => $u->id
                ]);

                /** service offer */
                factory('App\Models\Service_offer')->create(['service_id' => $u->id]);
            });


        /************************ Services Place *******************************/
        factory('App\Models\Service', 100)->create(['main_category' => 1])
            ->each(function ($u) {
                /** service images */
                // factory('App\Models\Service_Image')->create(['size' => 'large' ,'service_id' => $u->id]);
                // factory('App\Models\Service_Image')->create(['size' => 'medium' ,'service_id' => $u->id]);
                // factory('App\Models\Service_Image')->create(['size' => 'small' ,'service_id' => $u->id]);

                /** service addons */
                factory('App\Models\ServiceAddons')->create(['service_id' => $u->id]);

                /** service packages */
                factory('App\Models\ServicePackages')->create(['service_id' => $u->id]);

                /** service fitsWith */
                factory('App\Models\ServiceFitsWith')->create(['service_id' => $u->id]);

                /** service place */
                // $u->Service_Place()->save(factory('App\Models\Service_Place')->create());
                factory('App\Models\Service_Place')->create(['service_id' => $u->id]);

                /** service address */
                factory('App\Models\provider_address')->create([
                    'type' => 'place_address',
                    'foreign_id' => $u->id
                ]);

                /** service offer */
                factory('App\Models\Service_offer')->create(['service_id' => $u->id]);
            });
        factory('App\Models\Nav_bar', 5)->create();
        factory('App\Models\sliderBar', 5)->create();
        factory('App\Models\blogs', 10)->create();
    }
}
