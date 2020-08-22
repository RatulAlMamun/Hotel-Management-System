<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
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
    //protected $redirectTo = '/admin/dashbord';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
       public function __construct()
    {
        $this->middleware('guest:admin')->except('logout', 'adminlogout');
    }


       public function showAdminLogin(){
        return view('admin.adminlogin');
    }

    public function login(Request $request){


        $request->validate( [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        if(Auth::guard('admin')->attempt(['email' =>$request->email, 'password'=>$request->password], $request->remember)){
            return redirect('/home');
            
        	//return redirect()->intended(route('admin.deshbord'));

        }
        
        return redirect()->back()->with('adminerror', 'Email or password is incorrect');

    }

 public function adminlogout(Request $request)
    {
        Auth::guard('admin')->logout();

        //$request->session()->invalidate();

        return redirect('/adminlogin');
    }

}