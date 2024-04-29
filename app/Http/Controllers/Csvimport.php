<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspection;

class Csvimport extends Controller
{
    public function importData(Request $request): \Illuminate\Http\JsonResponse
    {
        // Validate the incoming request
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048', // Ensure it's a CSV file with a maximum size of 2MB
        ]);

        if ($request->file('file')->isValid()) {
            // Store the uploaded CSV file
            $csvPath = $request->file('file')->store('csv');

            // Open CSV file for reading
            if (($handle = fopen($csvPath, "r")) !== FALSE) {
                // Skip the first row if it contains column headers
                fgetcsv($handle, 1000, ";");

                // Read each row and insert into the database
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    // Create a new record in the database
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
                        'no_harmful_substances' => $data[29],
                        'no_vibrations' => $data[30],
                        'measured_vibration_level' => $data[31],
                        'allowed_vibration_level' => $data[32],
                        'exposure_time_limit' => $data[33],
                        'no_hand_body_vibrations' => $data[34],
                        'measured_hand_body_vibration_level' => $data[35],
                        'allowed_hand_body_vibration_level' => $data[36],
                        'hand_body_exposure_time_limit' => $data[37],
                        'measured_noise_level' => $data[38],
                        'allowed_noise_level' => $data[39],
                        'noise_exposure_time_limit' => $data[40],
                        'no_harmful_radiation' => $data[41],
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
                        'no_thermal_insulation' => $data[53],
                        'harmful_substances_exist' => $data[54],
                        'measured_harmful_substance_concentration' => $data[55],
                        'max_allowable_concentration' => $data[56],
                        'proper_ventilation_system' => $data[57]
                    ]);
                }

                fclose($handle);
            }

            // Delete the temporary uploaded CSV file
            unlink(storage_path('app/' . $csvPath));

            // Return a response indicating success
            return response()->json(['message' => 'Data imported successfully'], 200);
        }

        // If the file upload failed, return an error response
        return response()->json(['message' => 'Failed to import data'], 400);
    }
}
