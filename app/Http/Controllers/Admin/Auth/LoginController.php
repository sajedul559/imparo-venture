<?php

namespace App\Http\Controllers\Admin\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('guest:admin')->except('logout');
    //     $this->middleware('guest:user')->except('logout');
    // }

    // show login form
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        try {
            $remember = $request->get('remember') ? true : false;
            if (\Auth::guard('admin')->attempt($request->only(['email','password']), $remember)){

                return redirect()->route('admin.dashboard');
            }
            return back()->withInput()->withErrors('Username or password incorrect');
        } catch (\Exception $e) {
            return back()->withErrors('Incorrect Username or Password');
        }
    }
    


}
