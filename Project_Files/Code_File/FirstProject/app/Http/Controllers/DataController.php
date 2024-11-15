<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel; // <-- Add this import
use App\Imports\LargeDataImport;
use Illuminate\Http\Request;

use App\Models\CSVData;

use Session;
class DataController extends Controller
{

    public function Save_Data(Request $req){
        $CSVData = new CSVData;

        $CSVData->Code = $req->Code;
        $CSVData->Grouping = $req->Grouping;
        $CSVData->Classification = $req->Classification;
        $CSVData->Specialization = $req->Specialization;
        $CSVData->Definition = $req->Definition;
        $CSVData->Effective_Date = $req->Effective_Date;
        $CSVData->save();

        $req->session()->flash('Success_status', 'Data added successfully!');
        return redirect()->route('List');
    }

    public function List(){
        $CSVData = CSVData::get();
        return view('List', ['CSVData' => $CSVData]);
    }

    public function Drop_Data($id){
        $CSVData = CSVData::where('id', $id)->delete();
        Session::flash('Success_status', 'Data deleted successfully!');
        return redirect()->route('List');        
    }

    public function Edit_Data($id){
        $CSVData = CSVData::where('id', $id)->first();
        return view('Edit_Data', ['CSVData' => $CSVData]);
    }   

    public function Update_Data(Request $req, $id){

        $CSVData = CSVData::where('id', $id)->first();
        
        $CSVData->Code = $req->Code;
        $CSVData->Grouping = $req->Grouping;
        $CSVData->Classification = $req->Classification;
        $CSVData->Specialization = $req->Specialization;
        $CSVData->Definition = $req->Definition;
        $CSVData->Effective_Date = $req->Effective_Date;
        $CSVData->save();

        Session::flash('Success_status', 'Data updated successfully!');
        return redirect()->route('List');
    }


    public function Upload_CSV_File(Request $req)
    {
        $req->validate([
            'csv_file' => 'required|mimes:csv,txt|max:20480', // Max 20 MB
        ]);
        Excel::import(new LargeDataImport, $req->file('csv_file'));
        
        $req->session()->flash('Success_status', 'CSV file successfully imported!');
        return redirect()->route('List');
    }

    public function Search_Result(Request $req){
        
        $Result_CSVData = CSVData::where('Code', $req->Code)->first();

        $req->session()->flash('Success_status', 'Search result!');
        return view('List', ['Result_CSVData' => $Result_CSVData]);
    }
}
