<?php

namespace App\Http\Controllers\Admin;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class reportsController extends Controller
{
    public function index(){
        $allData =PurchaseOrder::all();
        return view('admin.reports.index');
    }


}
