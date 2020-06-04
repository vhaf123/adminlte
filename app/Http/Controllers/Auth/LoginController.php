<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use App\user;
use App\SocialAccount;
use Illuminate\Http\Request;

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

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {

        if(! $request->has('code') || $request->has('denied') ){
            return redirect('login');
        }
        
        $socialUser = Socialite::driver($provider)->user();
        
        $socialAccount =    SocialAccount::where('social', $provider)
                                        ->where('social_id', $socialUser->getId())
                                        ->first();
        
        if(!$socialAccount){

            $user = User::where('email', $socialUser->getEmail())->first();

            if(!$user)
            {

                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail()
                ]);

            }

            SocialAccount::create([
                'user_id' => $user->id,
                'social' => $provider,
                'social_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar()
            ]);


        }

        auth()->login($socialAccount->user);
     
        return redirect()->intended('/');

        /* 
        $socialUser = Socialite::driver($provider)->user();

        if($socialUser->name){
            $name = $socialUser->name;
        }else{
            $name = $socialUser->nickname;
        }

        $email = $socialUser->email;

        $check = User::where('email', $email)->first();

        if($check){
            $user = $check;
        }else{
            $user = User::create([
                'name' => $name,
                'email' => $email
            ]);
        }

        auth()->login($user);

        return redirect()->intended('/'); */
      
    }
}
