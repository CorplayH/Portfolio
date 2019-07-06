<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        if (!auth()->user()) {
            return view('backend.login');
        } else {
            return view('backend.master');
        }
    }

    public function login(LoginRequest $request)
    {
        $uToken =uToken();
        $data = [
            'email' => $request->email,
            'uToken' => $uToken,
            'password' => $request->password,
        ];
        $status = \Auth::attempt($data);
        if ($status) {
            return redirect('admin')->with('success', "Login success! ".auth()->user()->name);
        } else {
            return back()->withInput()->with('error', 'Incorrect user account or password.');
        }
    }

    public function logout()
    {
        \Auth::logout();

        return redirect()->route('loginPage')->with('success', 'See ya!');
    }


}
