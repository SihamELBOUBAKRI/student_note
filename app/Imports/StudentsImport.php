<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    public function model(array $row)
    {
        // Check if the 'name' field is empty or invalid
        if (empty($row[0])) {
            return null; // Skip this row if 'name' is missing
        }
    
        // Cast values directly to float
        $c1 = (float)$row[1];
        $c2 = (float)$row[2];
        $efm = (float)$row[4];
        $general_note_value = (float)$row[3];
    
        // Calculate moyenne and general_note
        $moyenne = ($c1 + $c2) / 2;
        $general_note = (($general_note_value / 2) * 0.25 + $general_note_value) / 2;
    
        // Ensure all required fields have data before inserting
        return new Student([
            'name' => $row[0],
            'c1' => $c1,
            'c2' => $c2,
            'moyenne' => $moyenne,
            'efm' => $efm,
            'general_note' => $general_note
        ]);
    }
    
}
