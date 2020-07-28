<?php

namespace Tests;

use App\CustomerUser;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        /** migrations */
        $dirs = array_diff(
            scandir(database_path('migrations')),
            array(".", "..", "2020_03_04_113705_create_service_food_search_views.php", "2020_03_04_113705_create_service_search_views.php")
        );

        $dirs2 = array_diff(scandir(base_path('vendor\laravel\passport\database\migrations')), array(".", ".."));


        foreach ($dirs as $file) {
            $this->artisan('migrate --path=database/migrations/' . $file);
        }

        foreach ($dirs2 as $file) {
            $this->artisan('migrate --path=vendor/laravel/passport/database/migrations/' . $file);
        }

        $this->artisan('db:seed');

        $this->artisan('passport:install');
    }
}