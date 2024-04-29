<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inspections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'protocol_number', 'graphic_attachment', 'document_date',
        'image_location_path', 'image_extension', 'image_location',
        'inspection_date', 'reinspection_date', 'client', 'object',
        'address', 'medium', 'machine_name', 'manufacturer', 'type',
        'machine_location', 'factory_number', 'id_number', 'production_year',
        'technical_specs', 'measured_impedance', 'measured_disconnection_time',
        'overvoltage_protection', 'switching_devices_type',
        'signalling_control_devices_type', 'safety_devices_type',
        'management_devices_type', 'measured_illumination',
        'direct_contact_protection', 'no_harmful_substances', 'no_vibrations',
        'measured_vibration_level', 'allowed_vibration_level', 'exposure_time_limit',
        'no_hand_body_vibrations', 'measured_hand_body_vibration_level',
        'allowed_hand_body_vibration_level', 'hand_body_exposure_time_limit',
        'measured_noise_level', 'allowed_noise_level', 'noise_exposure_time_limit',
        'no_harmful_radiation', 'radiation_protection_equipment_condition',
        'operational_switching_equipment_condition', 'signalling_control_equipment_condition',
        'safety_equipment_condition', 'management_equipment_condition',
        'work_according_to_instructions', 'tools_set_up_according_to_plans',
        'permanent_work_instructions', 'location_change_since_last_inspection',
        'machine_documentation', 'thermal_insulation_condition',
        'no_thermal_insulation', 'harmful_substances_exist',
        'measured_harmful_substance_concentration', 'max_allowable_concentration',
        'proper_ventilation_system',
    ];

    public static function create(array $array)
    {
    }
}
