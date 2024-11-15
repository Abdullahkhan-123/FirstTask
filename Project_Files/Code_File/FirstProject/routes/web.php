<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DataController;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LargeDataImport;
use App\Exports\CSVDataExport;

Route::get('/', function () {
    return view('index');
});


Route::get('List', [DataController::class, 'List'])->name('List');

Route::view('Add_Data', 'InsertData')->name('Add_Data');

Route::post('Save_Data', [DataController::class, 'Save_Data'])->name('Save_Data');

Route::post('Upload_CSV_File', [DataController::class, 'Upload_CSV_File'])->name('Upload_CSV_File');

Route::get('Drop_Data/{id}', [DataController::class, 'Drop_Data'])->name('Drop_Data');

Route::get('Edit_Data/{id}', [DataController::class, 'Edit_Data'])->name('Edit_Data');

Route::post('Update_Data/{id}', [DataController::class, 'Update_Data'])->name('Update_Data');

Route::get('Export-Csv', function () {
    return Excel::download(new CSVDataExport, 'csvdata_export.csv');
})->name('Export-Csv');

Route::post('Search_Result', [DataController::class, 'Search_Result'])->name('Search_Result');;