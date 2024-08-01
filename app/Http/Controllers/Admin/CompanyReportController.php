<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyReportController extends Controller
{
    public function create_company()
    {
        return view('admin.company.request_active_company');
    }

    /**
     * حفظ شركة جديدة.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

     public function store(Request $request)
     {
         // التحقق من صحة البيانات
         $validated = $request->validate([
             'company_name' => 'required|string|max:255',
             'representative_name' => 'required|string|max:255',
             'job_title' => 'required|string|max:255',
             'phone_number' => 'required|string|max:20',
             'email' => 'required|email|max:255',
             'ministry_info' => 'nullable|string',
             'required_screens' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
             'confidentiality_form' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
         ]);
     
         // مسار مجلد الشركة مع التاريخ
         $companyFolder = 'public/' . $validated['company_name'] . '/' . now()->format('Y-m-d');
     
         // رفع الملفات وحفظ المسارات
         if ($request->hasFile('required_screens')) {
             $file = $request->file('required_screens');
             $fileName = $file->getClientOriginalName();
             $filePath = $file->storeAs($companyFolder, $fileName, 'public');
             $validated['required_screens'] = $filePath;
         }
     
         if ($request->hasFile('confidentiality_form')) {
             $file = $request->file('confidentiality_form');
             $fileName = $file->getClientOriginalName();
             $filePath = $file->storeAs($companyFolder, $fileName, 'public');
             $validated['confidentiality_form'] = $filePath;
         }
     
         // إضافة user_id إلى البيانات
         $validated['user_id'] = Auth::id();
     
         // حفظ بيانات الشركة في قاعدة البيانات
         Company::create($validated);
     
         return redirect()->route('/')->with('success', 'تم طلب انشاء منشأه بنجاح.');
        }
}
