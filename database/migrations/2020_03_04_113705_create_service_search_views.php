<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateServiceSearchViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('DROP VIEW IF EXISTS service_search');

        DB::statement("
          CREATE VIEW service_search AS
          (SELECT
            `services`.`id` AS `id`,
            `provider`.`brand_name` AS `brand_name`,
            `provider`.`id` AS `provider_id`,
            `services_translation`.`name` AS `service_name`,
            `services_translation`.`description` AS `service_description`,
            `services_translation`.`locale` AS `locale`,
            `business_type_translation`.`name` AS `business_name`,
            `services_place`.`max_capacity` AS `max_capacity`,
            `services_place`.`min_price` AS `min_price`,
            `services_place`.`area` AS `area`,
            `provider_address`.`city_ar` AS `city_ar`,
            `provider_address`.`neighborhood_ar` AS `neighborhood_ar`,
            `provider_address`.`city_en` AS `city_en`,
            `provider_address`.`neighborhood_en` AS `neighborhood_en`,
            `services`.`main_category` AS `business_main_category`
        FROM
        (
            (
                (
                    (
                        (
                            (
                                `services`
                            JOIN `provider`
                            )
                        JOIN `services_translation`
                        )
                    JOIN `business_type_translation`
                    )
                JOIN `provider_address`
                )
            JOIN `business_type`
                 )
            JOIN `services_place`
            )
        WHERE
            (
                (`services`.`status` = 1
                ) AND(
                    `services`.`provider_id` = `provider`.`id`
                ) AND(
                    `services`.`id` = `services_translation`.`service_id`
                ) AND(
                    `services`.`business_type_id` = `business_type_translation`.`business_type_id`
                ) AND(
                    `business_type_translation`.`locale` = `services_translation`.`locale`
                ) AND(
                    `provider_address`.`foreign_id` = `services`.`id`
                ) AND(
                    `provider_address`.`type` = 'place_address'
                ) AND(
                    `business_type`.`id` = `services`.`main_category`
                ) AND(
                    `services_place`.`service_id`= `services`.`id`
                )
            )
        )
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS service_search');

    }
}
