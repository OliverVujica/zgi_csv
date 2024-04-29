<?php

// Učitavanje autoloadera i bootstrapping Laravela
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

// Rješavanje instance Laravel kernela
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Pokretanje aplikacije
$status = $kernel->handle(
    $input = new Symfony\Component\Console\Input\ArgvInput,
    new Symfony\Component\Console\Output\ConsoleOutput
);

use App\Models\Inspection;

// Putanja do CSV datoteke
$csvPath = base_path('strojevi1.csv');

// Otvori CSV datoteku za čitanje
if (($handle = fopen($csvPath, "r")) !== FALSE) {
    // Preskoči prvi redak ako sadrži nazive stupaca
    fgetcsv($handle, 1000, ";");

    // Čitaj redak po redak
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        // Kreiranje novog zapisa u bazi podataka
        Inspection::create([
            'protocol_number' => $data[0],
            'graphic_attachment' => $data[1],
            'document_date' => $data[2],
            'image_location_path' => $data[3],
            'image_extension' => $data[4],
            'image_location' => $data[5],
            'inspection_date' => $data[6],
            'reinspection_date' => $data[7],
            'client' => $data[8],
            'object' => $data[9],
            'address' => $data[10],
            'medium' => $data[11],
            'machine_name' => $data[12],
            'manufacturer' => $data[13],
            'type' => $data[14],
            'machine_location' => $data[15],
            'factory_number' => $data[16],
            'id_number' => $data[17],
            'production_year' => $data[18],
            'technical_specs' => $data[19],
            'measured_impedance' => $data[20],
            'measured_disconnection_time' => $data[21],
            'overvoltage_protection' => $data[22],
            'switching_devices_type' => $data[23],
            'signalling_control_devices_type' => $data[24],
            'safety_devices_type' => $data[25],
            'management_devices_type' => $data[26],
            'measured_illumination' => $data[27],
            'direct_contact_protection' => $data[28],
            'no_harmful_substances' => $data[29] === 'NE' ? true : false,
            'no_vibrations' => $data[30] === 'NE' ? true : false,
            'measured_vibration_level' => $data[31],
            'allowed_vibration_level' => $data[32],
            'exposure_time_limit' => $data[33],
            'no_hand_body_vibrations' => $data[34] === 'NE POSTOJE' ? true : false,
            'measured_hand_body_vibration_level' => $data[35],
            'allowed_hand_body_vibration_level' => $data[36],
            'hand_body_exposure_time_limit' => $data[37],
            'measured_noise_level' => $data[38],
            'allowed_noise_level' => $data[39],
            'noise_exposure_time_limit' => $data[40],
            'no_harmful_radiation' => $data[41] === 'NE' ? true : false,
            'radiation_protection_equipment_condition' => $data[42],
            'operational_switching_equipment_condition' => $data[43],
            'signalling_control_equipment_condition' => $data[44],
            'safety_equipment_condition' => $data[45],
            'management_equipment_condition' => $data[46],
            'work_according_to_instructions' => $data[47],
            'tools_set_up_according_to_plans' => $data[48],
            'permanent_work_instructions' => $data[49],
            'location_change_since_last_inspection' => $data[50],
            'machine_documentation' => $data[51],
            'thermal_insulation_condition' => $data[52],
            'no_thermal_insulation' => $data[53] === '' ? true : false, // Pretpostavljam da prazno znači da ne postoji izolacija
            'harmful_substances_exist' => $data[54] === '' ? false : true, // Pretpostavljam obrnuto za štetne materije
            'measured_harmful_substance_concentration' => $data[55],
            'max_allowable_concentration' => $data[56],
            'proper_ventilation_system' => $data[57],
        ]);
    }

    fclose($handle);
}

// Završetak skripte
$kernel->terminate($input, $status);