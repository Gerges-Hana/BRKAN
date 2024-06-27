<?php

namespace App\Http\Controllers\Admin;

class ReportsController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }
}
