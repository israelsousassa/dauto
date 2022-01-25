<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE TABLE IF NOT EXISTS `part` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `name` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                `refcode` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL,
                `quantity` INT NOT NULL,
                `unitvalue` DECIMAL NULL,
                `service_id` INT NOT NULL,
                `service_vehicle_id` INT NOT NULL,
                `service_vehicle_plate` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                `service_vehicle_state` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                `service_vehicle_person_id` INT NOT NULL,
                `service_vehicle_person_users_id` BIGINT NOT NULL,
                `created_at` TIMESTAMP NULL DEFAULT NULL,
                `updated_at` TIMESTAMP NULL DEFAULT NULL,
                PRIMARY KEY (`id`, `service_id`, `service_vehicle_id`, `service_vehicle_plate`, `service_vehicle_state`, `service_vehicle_person_id`, `service_vehicle_person_users_id`),
                INDEX `fk_part_service1_idx` (`service_id` ASC, `service_vehicle_id` ASC, `service_vehicle_plate` ASC, `service_vehicle_state` ASC, `service_vehicle_person_id` ASC, `service_vehicle_person_users_id` ASC) VISIBLE,
                CONSTRAINT `fk_part_service1`
                    FOREIGN KEY (`service_id` , `service_vehicle_id` , `service_vehicle_plate` , `service_vehicle_state` , `service_vehicle_person_id` , `service_vehicle_person_users_id`)
                    REFERENCES `service` (`id` , `vehicle_id` , `vehicle_plate` , `vehicle_state` , `vehicle_person_id` , `vehicle_person_users_id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION
            );
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('DROP TABLE part;');
    }
}
