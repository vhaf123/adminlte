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


        $socialUser = Socialite::driver($provider)->user();

        $socialAccount =    SocialAccount::where('social', $provider)
                                        ->where('social_id', $socialUser->getId())
                                        ->first();

        

        if(!$socialAccount){

            $user = User::where('email', $socialUser->getEmail())->first();

            if(!$user){
                echo "No existe el usuario";
            }

            /* if(!$user){
                $user->name = $socialUser->getName();
                $user->email = $socialUser->getEmail();
                $user->save();
            }

            $socialAccount->user_id = $user->id;
            $socialAccount->social = $provider;
            $socialAccount->social_id = $socialUser->getId();
            $socialAccount->avatar = $socialUser->getAvatar();
            $socialAccount->save(); */
        }

        auth()->login($socialAccount->user);

        return redirect()->intended('/');

        /* try
        {
            $socialUser = Socialite::driver($provider)->user();
        }
        catch (\Exception $e)
        {
            return redirect()->route('login')->with('warning', 'Hubo un error en el login...');
        }

        $socialAccount = SocialAccount::firstOrNew([
            'social' => $provider,
            'social_id' => $socialUser->getId()
        ]);

        if ( ! $socialAccount->exists )
        {
            $user = User::firstOrNew(['email' => $socialUser->getEmail()]);

            if (! $user->exists )
            {
                $user->name = $socialUser->getName();
                $user->save();
            }

            $socialAccount->avatar = $socialUser->getAvatar();

            $user->socialAccounts()->save( $socialAccount );
        }

        auth()->login($socialAccount->user);

        return redirect()->intended('/'); */



        /* if(! $request->has('code') || $request->has('denied') ){
            return redirect('login');
        }
        
        $socialUser = Socialite::driver($provider)->user();
        
        $socialAccount =    SocialAccount::where('social', $provider)
                                        ->where('social_id', $socialUser->getId())
                                        ->first();
        
        if(!$socialAccount->exists){

            $user = User::where('email', $socialUser->getEmail())->first();

            if(!$user->exists)
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
     
        return redirect()->intended('/'); */

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
