<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;

use App\Models\ActivationRequest;
use App\Models\Company;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
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
            'commercial' => 'required',
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

        $validated['user_id'] = Auth::id();
        $company = Company::create($validated);
        $user = User::find($request->input('user_id'));
        $activationRequest = ActivationRequest::where('user_id', $user)->first();
        $activationRequest = ActivationRequest::firstOrNew([
            'user_id' => Auth::id(),
        ]);
       
        $activationRequest->is_active = false;
        $activationRequest->save();
        return redirect()->route('companies.generatePdf.show', ['company' => $company->id])
            ->with('success', 'تم طلب انشاء منشأه بنجاح.')
            ->with('company', $company);
    }


    public function generatePdf()
    {
        // إعداد Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true); // للسماح بتحميل الصور من المسارات المحلية
        $options->set('defaultFont', 'Amiri'); // تعيين الخط الافتراضي
        $dompdf = new Dompdf($options);

        // تحميل HTML من View
        $pdfContent = view('admin.company.pdf_template')->render();

        // تحميل HTML إلى Dompdf
        $dompdf->loadHtml($pdfContent);

        // (اختياري) إعداد حجم الصفحة
        $dompdf->setPaper('A4', 'portrait');

        // رسم HTML إلى PDF
        $dompdf->render();

        // تحميل الـ PDF
        $dompdf->stream('document.pdf', array('Attachment' => 0));
    }

    // public function generatePdf()
    // {
    //     // إعداد Dompdf
    //     $options = new Options();
    //     $options->set('isHtml5ParserEnabled', true);
    //     $options->set('isPhpEnabled', true);
    //     $options->set('isRemoteEnabled', true); // للسماح بتحميل الصور من المسارات المحلية
    //     $options->set('defaultFont', 'Amiri'); // تعيين الخط الافتراضي
    //     $dompdf = new Dompdf($options);

    //     // تحميل HTML من View
    //     $pdfContent = view('admin.company.pdf_template')->render();

    //     // تحميل HTML إلى Dompdf
    //     $dompdf->loadHtml($pdfContent);

    //     // (اختياري) إعداد حجم الصفحة
    //     $dompdf->setPaper('A4', 'portrait');

    //     // رسم HTML إلى PDF
    //     $dompdf->render();

    //     // تحميل الـ PDF
    //     $dompdf->stream('document.pdf', array('Attachment' => 0));
    // }






    // public function generatePdf()
    // {
    //     // إعداد Dompdf
    //     $options = new Options();
    //     $options->set('isHtml5ParserEnabled', true);
    //     $options->set('isPhpEnabled', true);
    //     $options->set('isRemoteEnabled', true); // للسماح بتحميل الصور من المسارات المحلية
    //     $dompdf = new Dompdf($options);

    //     // تحميل HTML من View
    //     $pdfContent = view('admin.company.pdf_template')->render();

    //     // تحميل HTML إلى Dompdf
    //     $dompdf->loadHtml($pdfContent);

    //     // (اختياري) إعداد حجم الصفحة
    //     $dompdf->setPaper('A4', 'portrait');

    //     // رسم HTML إلى PDF
    //     $dompdf->render();

    //     // تحميل الـ PDF
    //     $dompdf->stream('document.pdf', array('Attachment' => 0));
    // }



    // public function generatePdf()
    // {
    //     // إعداد Dompdf
    //     $options = new Options();
    //     $options->set('isHtml5ParserEnabled', true);
    //     $options->set('isPhpEnabled', true);
    //     $dompdf = new Dompdf($options);

    //     // تحميل HTML من View
    //     $pdfContent = view('admin.company.pdf_template')->render();

    //     // تحميل HTML إلى Dompdf
    //     $dompdf->loadHtml($pdfContent);

    //     // (اختياري) إعداد حجم الصفحة
    //     $dompdf->setPaper('A4', 'portrait');

    //     // رسم HTML إلى PDF
    //     $dompdf->render();

    //     // تحميل الـ PDF
    //     $dompdf->stream('document.pdf', array('Attachment' => 0));
    // }


    public function ShowPdf($companyId)
    {
        $company = Company::find($companyId);
        return view('admin.company.pdf_template', compact('company'));
    }
}
