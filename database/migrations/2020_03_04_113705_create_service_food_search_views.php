<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateServiceFoodSearchViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('DROP VIEW IF EXISTS service_food_search');

        DB::statement("
          CREATE VIEW service_food_search AS
          (SELECT
            `services`.`id` AS `id`,
            `provider`.`brand_name` AS `brand_name`,
            `provider`.`id` AS `provider_id`,
            `services_translation`.`name` AS `service_name`,
            `services_translation`.`description` AS `service_description`,
            `services_translation`.`locale` AS `locale`,
            `business_type_translation`.`name` AS `business_name`,
            `business_type`.`parent_id` AS `business_main_category`,
            `services_food`.`max_num_order_day` AS `max_num_order_day`,
            `services_food`.`price_per_item` AS `price_per_item`
        FROM
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
                JOIN `services_food`
                )
            JOIN `business_type`
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
                    `business_type`.`id` = `services`.`main_category`
                ) AND(
                    `services`.`id` = `services_food`.`service_id`
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
        DB::statement('DROP VIEW IF EXISTS service_food_search');
    }
}
