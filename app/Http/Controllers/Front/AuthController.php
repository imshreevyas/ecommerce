<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'max:10'],
            'otp' => ['required', 'string', 'digits:4'],
        ]);

        // Find user by phone number
        $user = User::where('phone', $request->phone)->first();

         if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        // Verify OTP
        if (strval($user->otp) !== $request->otp) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid or expired OTP'
            ], 422);
        }

        // Clear OTP after successful verification
        $user->otp = null;
        $user->last_login_at = now();
        $user->last_login_ip = $request->ip();
        $user->save();

        // Log the user in (session-based authentication)
        Auth::login($user);

        // redirect to account-details
        return response()->json([
            'status' => 'success',
            'message' => 'Login successful!'
        ]);
    }

    public function requestOtp(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'max:10'],
        ]);

        // Generate 4-digit OTP
        $otp = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);

        // Find or create user
        $user = User::firstOrCreate(
            ['phone' => $request->phone],
            [
                'fullname' => 'User_' . Str::random(8),
                'email' => null,
                'status' => 'active'
            ]
        );
        
        // Update OTP details
        $user->otp = $otp;
        $user->save();

        // Store OTP in session for verification (optional)
        $request->session()->put('otp_phone', $request->phone);
        $request->session()->put('otp_code', $otp);

        // In production, you would send the OTP via SMS here
        // For development, we'll flash it to the session
        return response()->json([
            'status' => 'success',
            'message' => 'OTP sent successfully',
            'data' => [
                'otp' => $otp, // Remove this in production
            ]
        ]);
    }
    public function userAccount()
    {
        return view('front.account-details', [
            'user' => Auth::user()
        ]);
    }
    public function userUpdate(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required'],
        ]);

        $user = Auth::user();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('account-details')->with('success', 'Account details updated successfully');
    }

    public function logout(Request $request)
    {
        try {
            // Log the user out (session-based)
            Auth::logout();

            // Clear session data
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('success', 'Logged out successfully');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Logout failed');
        }
    }
}
