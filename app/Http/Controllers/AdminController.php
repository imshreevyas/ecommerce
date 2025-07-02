<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.auth.login');
    }
     public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:admins,email'],
        ]);

        try{
            $email = $request->email;
            $user = Admin::where(['email'=>$email,'status'=>'active'])->first();
            if(!$user){
                return json_encode(['message'=>'admin not found']);
            }
            $otpCode = rand(100000, 999999);
            
            // Store the new OTP
            Admin::where('email', $email)->update([
                'otp' => $otpCode
            ]);

            // Send OTP via email
            return response()->json(['message'=>"mail sent successfully"],200);
            // if(Mail::to($email)->send(new OtpMail($otpCode))){
            // }else{
            //     return response()->json(['message'=>"operation failed"],401);
            // }
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'type' => 'fail'
            ], 500);
        }
    }
    public function verifyOTP(Request $request){
        $request->validate([
            'email' => ['required', 'email', 'exists:admins,email'],
            'otp' => ['required', 'digits:6'],
        ]);
        try{
                $email = $request->email;
                $otp = $request->otp;
                $admin = Admin::where(['email' => $email, 'otp' => $otp])->first();
                if ($admin) {
                    // Clear the OTP after successful verification
                    $admin->update(['otp' => 0]);
                    // Log in the admin user
                    Auth::guard('admin')->login($admin);
                return response()->json([
                        'message' => 'Registration successful',
                        'type' => 'success',
                    ],200);
                } else {
                    return response()->json([
                            'message'=>"verification failed",
                            'type'=>'fail'
                    ],401);
                }
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'type' => 'fail'
            ], 500);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function profile(){
        return view('admin.account.profile');
    }

    public function edit_profile(){
        $data['admin_details'] = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        return view('admin.account.editProfile', $data);
    }
}
