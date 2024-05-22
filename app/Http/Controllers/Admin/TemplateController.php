<?php

namespace App\Http\Controllers\Admin;

class TemplateController extends Controller
{
    public function home()
    {
        return view('admin.index');
    }

    public function orders()
    {
        return view('admin.orders.index');
    }

    public function reports()
    {
        return view('admin.reports.index');
    }
}
