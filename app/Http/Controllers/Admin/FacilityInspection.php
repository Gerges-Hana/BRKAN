<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacilityInspection extends Controller
{
    //
    public function Facility_inspection(){
        return view('admin.Facility inspection.index_Facility_inspection');
    }
}
