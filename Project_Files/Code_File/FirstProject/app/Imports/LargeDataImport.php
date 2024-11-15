<?php

namespace App\Imports;

use App\Models\CSVData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class LargeDataImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Ensure Effective Date is parsed correctly
        $effectiveDate = null;

        if (!empty($row['effective_date'])) {
            try {
                $effectiveDate = Carbon::createFromFormat('m/d/Y', trim($row['effective_date']))->format('Y-m-d');
            } catch (\Exception $e) {
                \Log::error('Date parsing error:', ['row' => $row['effective_date'], 'error' => $e->getMessage()]);
            }
        }

        \Log::info('Parsed Effective_Date:', ['date' => $effectiveDate]);

        return new CSVData([
            'Code' => $row['code'],          
            'Grouping' => $row['grouping'],      
            'Classification' => $row['classification'],
            'Specialization' => $row['specialization'],
            'Definition' => $row['definition'],    
            'Effective_Date' => $effectiveDate,
        ]);
    }
}
