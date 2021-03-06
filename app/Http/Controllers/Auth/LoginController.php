<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;
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
    protected $redirectTo = '/isadmin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();

        // check if user exists and log user in
        $email=$userSocial->user['email'];

        $user= User::where('email',$email)->first();

        if($user){
            if(Auth::loginUsingId($user->id)){
                return redirect('/profile');
            }
        }


        //else sign the user up
        $type=0;

        $userSignup= User::create([
            'name' => $userSocial->user['name'],
            'email' => $userSocial->user['email'],
            'password' =>bcrypt('1234'),
            'phone' =>'1234',
            'type' =>$type,
            'city' =>"city",
//            'avatar' => $userSocial->avatar,
            //'facebook_profile' => $userSocial->user['link'],
            // 'gender' => $userSocial->user['gender'],
        ]);
        // finally log the user in
        if($userSignup){
            if(Auth::loginUsingId($userSignup->id)){
                return redirect('/profile');
            }
        }
    }



    //////////////
    ///
    ///
    public function redirectToProvidertwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }


    public function handleProviderCallbacktwitter()
    {
        $userSocial = Socialite::driver('twitter')->user();

        // check if user exists and log user in
        $email=$userSocial->name;


        $user= User::where('email',$email)->first();

        if($user){
            if(Auth::loginUsingId($user->id)){
                return redirect('/profile');
            }
        }


        //else sign the user up
        $type=0;

        $userSignup= User::create([
            'name' => $userSocial->name,
            'email' => $userSocial->name,
            'password' =>bcrypt('1234'),
            'phone' =>'1234',
            'type' =>$type,
            'city' =>"city",

//            'avatar' => $userSocial->avatar,
            //'facebook_profile' => $userSocial->user['link'],
            // 'gender' => $userSocial->user['gender'],
        ]);
        // finally log the user in
        if($userSignup){
            if(Auth::loginUsingId($userSignup->id)){
                return redirect('/profile');
            }
        }
    }







    //////////github//////////////////
    public function redirectToProvidergithub()
    {
        return Socialite::driver('github')->redirect();
    }


    public function handleProviderCallbackgithub()
    {
        $userSocial = Socialite::driver('github')->user();

        // check if user exists and log user in
        $email=$userSocial->user['email'];

        $user= User::where('email',$email)->first();

        if($user){
            if(Auth::loginUsingId($user->id)){
                return redirect('/profile');
            }
        }


        //else sign the user up
        $type=0;

        $userSignup= User::create([
            'name' => $userSocial->user['name'],
            'email' => $userSocial->user['email'],
            'password' =>bcrypt('1234'),
            'phone' =>'1234',
            'type' =>$type,
            'city' =>"city",
//            'avatar' => $userSocial->avatar,
            //'facebook_profile' => $userSocial->user['link'],
            // 'gender' => $userSocial->user['gender'],
        ]);
        // finally log the user in
        if($userSignup){
            if(Auth::loginUsingId($userSignup->id)){
                return redirect('/profile');
            }
        }
    }

///////////////////////////////////////////////
  public function redirectToProvidergoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleProviderCallbackgoogle()
    {
        $userSocial = Socialite::driver('google')->user();

        // check if user exists and log user in
        $email=$userSocial->user['email'];

        $user= User::where('email',$email)->first();

        if($user){
            if(Auth::loginUsingId($user->id)){
                return redirect('/profile');
            }
        }


        //else sign the user up
        $type=0;

        $userSignup= User::create([
            'name' => $userSocial->user['name'],
            'email' => $userSocial->user['email'],
            'password' =>bcrypt('1234'),
            'phone' =>'1234',
            'type' =>$type,
            'city' =>"city",
//            'avatar' => $userSocial->avatar,
            //'facebook_profile' => $userSocial->user['link'],
            // 'gender' => $userSocial->user['gender'],
        ]);
        // finally log the user in
        if($userSignup){
            if(Auth::loginUsingId($userSignup->id)){
                return redirect('/profile');
            }
        }
    }


    public function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }
        return redirect()->intended($this->redirectPath());
    }

}
