<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;

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
    protected function redirectTo()
    {
        if (auth()->user()->user_role == '1') {
            return '/admin';
        }
        if (auth()->user()->user_role == '2') {
            return '/member';
        }
        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
       * Get the needed authorization credentials from the request.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return array
       */
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'member_id' => 'required',
            'password' => 'required',
        ]);
  
        $fieldType = filter_var($request->member_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'member_id';
        if(auth()->attempt(array($fieldType => $input['member_id'], 'password' => $input['password'])))
        {
            if (auth()->user()->user_role == '1') {
                return redirect('admin');
            }
            if (auth()->user()->user_role == '2') {
                return redirect('member');
            }
            return '/';
        }else{
            Session::flash('error', 'Enter valid credentials');
            return redirect('login');
        }
          
    }
}
