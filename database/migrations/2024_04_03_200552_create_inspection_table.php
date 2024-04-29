<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->string('protocol_number');
            $table->string('graphic_attachment');
            $table->date('document_date');
            $table->string('image_location_path');
            $table->string('image_extension');
            $table->string('image_location');
            $table->date('inspection_date');
            $table->date('reinspection_date')->nullable();
            $table->string('client');
            $table->string('object');
            $table->string('address');
            $table->string('medium');
            $table->string('machine_name');
            $table->string('manufacturer');
            $table->string('type');
            $table->string('machine_location');
            $table->string('factory_number');
            $table->string('id_number');
            $table->year('production_year');
            $table->text('technical_specs');
            $table->float('measured_impedance');
            $table->float('measured_disconnection_time');
            $table->string('overvoltage_protection');
            $table->string('switching_devices_type');
            $table->string('signalling_control_devices_type');
            $table->string('safety_devices_type');
            $table->string('management_devices_type');
            $table->string('measured_illumination');
            $table->string('direct_contact_protection');
            $table->boolean('no_harmful_substances')->default(false);
            $table->boolean('no_vibrations')->default(false);
            $table->float('measured_vibration_level')->nullable();
            $table->float('allowed_vibration_level')->nullable();
            $table->float('exposure_time_limit')->nullable();
            $table->boolean('no_hand_body_vibrations')->default(false);
            $table->float('measured_hand_body_vibration_level')->nullable();
            $table->float('allowed_hand_body_vibration_level')->nullable();
            $table->float('hand_body_exposure_time_limit')->nullable();
            $table->float('measured_noise_level');
            $table->float('allowed_noise_level');
            $table->float('noise_exposure_time_limit');
            $table->boolean('no_harmful_radiation')->default(false);
            $table->string('radiation_protection_equipment_condition');
            $table->string('operational_switching_equipment_condition');
            $table->string('signalling_control_equipment_condition');
            $table->string('safety_equipment_condition');
            $table->string('management_equipment_condition');
            $table->boolean('work_according_to_instructions')->default(false);
            $table->boolean('tools_set_up_according_to_plans')->default(false);
            $table->boolean('permanent_work_instructions')->default(false);
            $table->boolean('location_change_since_last_inspection')->default(false);
            $table->string('machine_documentation');
            $table->string('thermal_insulation_condition');
            $table->boolean('no_thermal_insulation')->default(false);
            $table->boolean('harmful_substances_exist')->default(false);
            $table->float('measured_harmful_substance_concentration')->nullable();
            $table->float('max_allowable_concentration')->nullable();
            $table->boolean('proper_ventilation_system')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspections');
    }
}
