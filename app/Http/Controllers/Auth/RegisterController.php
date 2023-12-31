<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function register()
	{
		return view('auth/register');
	}
    public function login()
	{
		return view('auth/login');
	}

    public function registerSimpan(Request $request)
	{
		Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed'
		])->validate();

		User::create([
			'name' => $request->name,
			'email' => $request->email,
			'level' => 'admin',
			'password' => Hash::make($request->password)
		]);

		return redirect()->route('login')->with('Sukses','Sukses melakukan registrasi. Silahkan login');
	}

    // public function loginAksi(Request $request)
	// {
	// 	Validator::make($request->all(), [
	// 		'email' => 'required|email',
	// 		'password' => 'required'
	// 	])->validate();

	// 	if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
	// 		throw ValidationException::withMessages([
	// 			'email' => trans('auth.failed')
	// 		]);
	// 	}

	// 	$request->session()->regenerate();

	// 	return redirect()->route('home');
	// }
}
