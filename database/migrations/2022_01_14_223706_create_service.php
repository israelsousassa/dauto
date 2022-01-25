<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE TABLE IF NOT EXISTS `service` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `serviceprovider` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                `entry` DATETIME NOT NULL,
                `departure` DATETIME NOT NULL,
                `diagnosis` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                `description` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL,
                `km` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                `vehicle_id` INT NOT NULL,
                `vehicle_plate` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                `vehicle_state` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                `vehicle_person_id` INT NOT NULL,
                `vehicle_person_users_id` BIGINT NOT NULL,
                `created_at` TIMESTAMP NULL DEFAULT NULL,
                `updated_at` TIMESTAMP NULL DEFAULT NULL,
                PRIMARY KEY (`id`, `vehicle_id`, `vehicle_plate`, `vehicle_state`, `vehicle_person_id`, `vehicle_person_users_id`),
                INDEX `fk_service_vehicle1_idx` (`vehicle_id` ASC, `vehicle_plate` ASC, `vehicle_state` ASC, `vehicle_person_id` ASC, `vehicle_person_users_id` ASC) VISIBLE,
                CONSTRAINT `fk_service_vehicle1`
                    FOREIGN KEY (`vehicle_id` , `vehicle_plate` , `vehicle_state` , `vehicle_person_id` , `vehicle_person_users_id`)
                    REFERENCES `vehicle` (`id` , `plate` , `state` , `person_id` , `person_users_id`)
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
        \DB::statement('DROP TABLE service;');
    }
}
