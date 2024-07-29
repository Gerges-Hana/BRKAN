<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('admin.home.index');
    }
    
    public function index()
    {
        // return view('admin.home.index');

        $user = auth()->user();
        $ActivationRequest=ActivationRequest::where('id',$user->id)->where('is_active',false)->latest();
        if ($user->user_type == 'company') {

            if ($user->is_active ==true && $ActivationRequest) {
               
                return view('admin.company.activ_company', compact('user'));
            }
            return view('admin.company.inactiv_company', compact('user'));
        }
        return view('admin.home.index');
    }



    public function requestActivation(Request $request)
    {
        $activationRequest = new ActivationRequest();
        $activationRequest->user_id = $request->user_id;
        $activationRequest->save();

        return response()->json(['success' => true]);
    }


    public function showActivationRequests()
    {
        $requests = ActivationRequest::with('user')->get();
        return view('admin.activation_requests', compact('requests'));
    }

    public function activateAccount(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
    
        $user = User::find($request->input('user_id'));
    
        if ($user) {
            // Check if the user already has an activation request
            $activationRequest = ActivationRequest::where('user_id', $user->id)->first();
    
            if ($activationRequest && $activationRequest->is_active) {
                // If the activation request exists and is active, return a message that the account is already active
                return redirect()->back()->with([
                    'info' => 'حسابك مفعل بالفعل.',
                    'not_active' => true
                ]);
            }
    
            // Create or update the activation request
            $activationRequest = ActivationRequest::firstOrNew([
                'user_id' => $user->id,
            ]);
            $activationRequest->is_active = false;
            $activationRequest->save();
    
            // Optionally, you can set the user to be active immediately
            // $user->is_active = true;
            // $user->save();
            $not_active = true;
    
            return redirect()->back()->with([
                'success' => 'جار تفعيل الحساب.',
                'not_active' => false
            ]);
        }
    
        return redirect()->back()->with('error', 'حدث خطأ. يرجى المحاولة مرة أخرى.');
    }
    
    
}
