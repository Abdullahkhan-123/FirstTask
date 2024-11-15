<?php

namespace App\Exports;

use App\Models\CSVData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CSVDataExport implements FromCollection, WithHeadings
{
    /**
     * Fetch all records from the CSVData model, excluding the 'id' column.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Select only the columns you want to export (excluding 'id')
        return CSVData::select('Code', 'Grouping', 'Classification', 'Specialization', 'Definition', 'Effective_Date')->get();
    }

    /**
     * Define the headings for the CSV file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Code',
            'Grouping',
            'Classification',
            'Specialization',
            'Definition',
            'Effective_Date',
        ];
    }
}

