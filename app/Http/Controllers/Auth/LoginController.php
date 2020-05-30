<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use App\user;
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

        //Verifica si se ha rechazado la solicitud
        if(! $request->has('code') || $request->has('denied') ){
            return redirect('login');
        }

        //Almacena en una variable los datos devueltos por la red social
        $socialUser = Socialite::driver($provider)->user();

        //Recuperando nombre de usuario
        if($socialUser->name){
            $name = $socialUser->name;
        }else{
            $name = $socialUser->nickname;
        }

        //Recuperando email de usuario
        $email = $socialUser->email;

        //Verifica si existe un usuario registrado con ese correo, de no ser así, se crea uno
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

        return redirect()->intended('/');
      
    }
}
