<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        // $input = $request->all();

        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        // {
            // if(auth()->user()->level == 'admin') {
            //     return redirect()->route('dashboard');
            // }else{
            //     return redirect()->route('home');
            // }
        // }else{
        //     // return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
        //     return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors('error','Email-Address And Password Are Wrong.');
        // }

        try {
            if (Auth::attempt($credentials)) {
                // Login berhasil
                if(auth()->user()->level == 'admin') {
                    return redirect()->route('dashboard');
                }else{
                    return redirect()->route('home');
                }
            }
        } catch (ValidationException $e) {
            throw $e;
        }
    
        // Jika login gagal
        throw ValidationException::withMessages([
            'email' => 'Email atau password salah.',
        ]);

    }
}
