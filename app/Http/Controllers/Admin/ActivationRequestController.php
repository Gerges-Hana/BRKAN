<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
use App\Models\ActivationRequest;
use Illuminate\Http\Request;

class ActivationRequestController extends Controller
{
    public function index()
    {
        $activationRequests = ActivationRequest::where('is_active',false)->with('user')->get();
        return view('admin.activation_requests.index', compact('activationRequests'));
    }

    // public function approve($id)
    // {
    //     $activationRequest = ActivationRequest::find($id);
    //     dd($id,$activationRequest->is_active);
    //     if ($activationRequest) {
    //         $user = $activationRequest->user;
    //         $user->is_active = true;
    //         $user->save();
    //     }

    //     return redirect()->route('admin.activation_requests.index')->with('success', 'تم تفعيل الحساب بنجاح.');
    // }


    public function approve($id)
{
    // العثور على سجل ActivationRequest باستخدام المعرف
    $activationRequest = ActivationRequest::find($id);

    // التحقق مما إذا كان سجل ActivationRequest موجودًا
    if ($activationRequest) {
        // العثور على المستخدم المرتبط بالطلب
        $user = $activationRequest->user;

        if ($user) {
            // تحديث حالة المستخدم إلى مفعل
            $user->is_active = true;
            $user->save();

            // تحديث حالة الطلب إلى مفعل
            $activationRequest->is_active = true;
            $activationRequest->save();

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->route('admin.activation_requests.index')->with('success', 'تم تفعيل الحساب بنجاح.');
        }

        // رسالة خطأ إذا لم يتم العثور على المستخدم
        return redirect()->route('admin.activation_requests.index')->with('error', 'لم يتم العثور على المستخدم المرتبط.');
    }

    // رسالة خطأ إذا لم يتم العثور على الطلب
    return redirect()->route('admin.activation_requests.index')->with('error', 'لم يتم العثور على طلب التفعيل.');
}

}
