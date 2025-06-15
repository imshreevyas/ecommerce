<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\Admin;
use Illuminate\Http\Request;
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
        if(Mail::to($email)->send(new OtpMail($otpCode))){
            return json_encode(['message'=>"mail sent successfully"]);
        }else{
            return json_encode(['message'=>"operation failed"]);
        }
    }
    public function verifyOTP(Request $request){
        $request->validate([
            'email' => ['required', 'email', 'exists:admins,email'],
            'otp' => ['required', 'digits:6'],
        ]);

        $email = $request->email;
        $otp = $request->otp;

        $admin = Admin::where(['email' => $email, 'otp' => $otp])->first();

    if ($admin) {
            // Clear the OTP after successful verification
            $admin->update(['otp' => 0]);

            // Log in the admin user
            // auth()->login($admin);

            return json_encode(['message'=>"verification successful"]);
        } else {
            return json_encode(['message'=>"verification failed"]);
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
}
