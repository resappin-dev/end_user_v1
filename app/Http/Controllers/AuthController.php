<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\EmailVerification;
use App\Mail\EmailResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function verifyEmail($email)
{
    // \Log::info('Starting email verification for: ' . $email);
    
    $customer = Customer::where('email', $email)->first();
    // \Log::info('Customer query result:', ['customer' => $customer]);
    
    if($customer) {
        // \Log::info('Customer found, updating verification timestamp');
        $customer->update(['email_verified_at' => now()]);
        
        // \Log::info('Attempting login for customer ID: ' . $customer->id);
        Auth::loginUsingId($customer->id);
        
        // \Log::info('Redirecting to verify-success');
        return redirect('verify-success/'. $email);
    }
    
    // \Log::info('Customer not found, redirecting to failed-verification');
    return redirect('/failed-verification');
}


    public function verifySuccess($email) {
        $checkUser = DB::table('customers')->where('email',$email)->first();
        header("Refresh:5; url=http://127.0.0.1:8000/");
        return view ('session.verify');
    }

    public function resendEmailVerification(Request $request)
    {
        $customer = DB::table('customers')->where('email', $request->email)->first();
        
        if($customer) {
            Mail::to($customer->email)->send(new EmailVerification($customer));

            return redirect('/login')->withSuccess('Resend Email Verification Link Success! Please check your email to complete verification. Thankyou.');
        }

        return redirect('/login')->withErrors('Email not found. Please check your email address.');
    }

    public function forget(){
        return view('session.reset-password-request');
    }

    public function failedVerification() {
        session()->put('failed', 'failed');
        return view('session.verify-account');
    }

    public function pendingVerification() {
        session()->forget('failed');
        session()->flush();
        session()->put('pending', 'pending.');
        return view('session.verify-account');
    }

    public function showResetForm($email)
    {
        return view('session.new-password-form', ['email' => $email]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $customer = Customer::where('email', $request->email)->first();
        $customer->update(['password' => bcrypt($request->password)]);

        return redirect('/login')->withSuccess('Password has been reset successfully');
    }

    public function index()
    {
        return view('session.login');
    }

    public function register()
    {
        return view('session.register');
    }

    public function forgetVerify(Request $request)
    {
        $request->validate([
            'email' => 'required|min:5|max:200',
        ], [
            'email.required' => 'Email tidak boleh kosong',
        ]);
        
        $cekEmailRegistered = Customer::where('email', $request->email)->first();

        if($cekEmailRegistered == null){
            session()->put('failed', 'failed');
            return view('session.forgot-verify');
        } else {
            session()->forget('failed');
            session()->flush();
            Mail::to($request->email)
                ->send(new EmailResetPassword($cekEmailRegistered));
            return view('session.forgot-verify');
        }
    }

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|min:3|max:255',
        'password' => 'required|max:255'
    ], [
        'username.required' => 'Username tidak boleh kosong',
        'password.required' => 'Password tidak boleh kosong'
    ]);

    $credentials = [
        'username' => $request->username,
        'password' => $request->password,
    ];

    $emailVerified = Customer::where('username', $request->username)->first();

    // if (!$emailVerified) {
    //     return redirect('/login')
    //         ->withError('Invalid username or password');
    // }
    
    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($emailVerified->email_verified_at == null) {
            Auth::logout();
            Mail::to($emailVerified->email)
                ->send(new EmailVerification($emailVerified));

            return redirect('pending-verification')
                ->withInfo('Please verify your email first. Verification link has been sent.');
        }

        DB::table('customers')
            ->where('username', $request->username)
            ->update(['last_login' => now()]);

        return redirect('/')
            ->withSuccess('Welcome back, ' . $user->name);
    }

    return redirect('/login')
        ->withError('Invalid username or password');
}

    

    public function storeRegister(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|min:3|max:255',
            'email' => 'required|unique:customers|email',
            'password' => 'required|min:5|max:255|confirmed',
            'password_confirmation' => 'min:5'
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Alamat Email sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $token = strtoupper(bin2hex(random_bytes(5)));

        $customer = Customer::create([
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => date('Y-m-d H:i:s'),
            'verification_token' => $token
        ]);

        if ($customer) {
            Mail::to($customer->email)
                ->send(new EmailVerification($customer));

            return redirect('/login')->withSuccess('Register Success! Please check your email to complete verification. Thankyou.');
        } else {
            return redirect('/register')->with('error', 'Registrasi gagal. Silakan coba lagi.');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
}
