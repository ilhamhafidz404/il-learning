<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\LecturerImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class ExcelController extends Controller
{
    public function importLecturer(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move('excel', $fileName);

        Excel::import(new LecturerImport, \public_path('/excel/' . $fileName));
        File::delete(public_path('/excel/' . $fileName));

        return redirect()->back()->with([
            'success' => true,
            'title' => 'Successfully Import Excel',
            'message' => 'Now Data Lecturer has changed using excel file'
        ]);
    }
}
