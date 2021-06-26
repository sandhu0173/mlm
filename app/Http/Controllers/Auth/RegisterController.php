<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\MemberTree;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Classes\Helpers;
use Session;
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
    function showRegistrationForm(Request $request)
    {
        $data['code']="";
        $data['side']="";
        $data['sponsor']="";
        if($request->has('code'))
        {
            $data['code']=$request->code;
            $user=User::where('member_id',$request->code)->first();
            if($user)
            {
                $data['sponsor']=$user->name;
            }
            
        }
        if($request->has('side'))
        {
            $data['side']=$request->side;
        }
        return view('auth.register',$data);
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
            'mobile' => ['required','numeric'],
            'tracking_id' => ['required'],
            'side' => ['required'],
            'address' => ['required'],
            'pincode' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $passkey=Helpers::generateRandomNumber(8);
        $member_id=Helpers::generateRandomNumber(6);
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile'=>$data['mobile'],
            'tracking_id'=>$data['tracking_id'],
            'side'=>$data['side'],
            'address'=>$data['address'],
            'pincode'=>$data['pincode'],
            'user_role'=>2,
            'password' => Hash::make($passkey),
            'member_id' => $member_id,
            'passkey' => $passkey,
        ]);
        $id=$user->id;
        $sponsor=User::where('member_id',$data['tracking_id'])->first();
        $sponsor_id=$sponsor->id;
        if($data['side']=='1')
        {
            $parent=Helpers::getLeftMemeber($sponsor_id);
        }
        if($data['side']=='2')
        {
            $parent=Helpers::getRightMemeber($sponsor_id);
        }
        MemberTree::create([
            'parent_id'=>$parent,
            'member_id'=>$id,
            'side'=>$data['side'],
          ]);

        $message='You successfully Registered.You can login to your dashboard. Your <br>Member Id: '.$member_id."<br> Password:".$passkey;
        $mobile=$data['mobile'];
        $url = "https://www.smsalert.co.in/api/push.json?apikey=609a20b1b2d84&sender=CVDEMO&mobileno=".$mobile."&text=".$message;
  
        // Initialize a CURL session.
        $ch = curl_init(); 
        
        // Return Page contents.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $url);
        
        $result = curl_exec($ch);
        
        //echo $result; 
        Session::flash('message', 'You successfully Registered <br> Member Id: '.$member_id."<br> Password:".$passkey);
        return $user;
    }
    protected function redirectTo()
    {
       /* if (auth()->user()->user_role == '1') {
            return '/admin';
        }
        if (auth()->user()->user_role == '2') {
            return '/member';
        }*/
        return '/register';
    }
    function getsponsor(Request $request)
    {
        $user=User::where('member_id',$request->sid)->first();
        $response['success']=false;
        if($user)
        {
            $response['success']=true;
            $response['name']=$user->name;
        }
        return response()->json($response);
    }
}
