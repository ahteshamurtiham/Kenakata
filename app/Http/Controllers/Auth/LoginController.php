<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

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

    //github login er jonno
    public function redirectToProvider()
    {

        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        $prov_id= $user->getId();


         if($authuser = User::where('provider_id',$prov_id)->first()){ //user table e github er id match holei login e dukte dibe

            Auth::login($authuser,true);
            return redirect('/home');

         }
         elseif(User::where('email',$user->getEmail())->first()){

            return redirect()->back()->with('errorMsg',"Your Github Email Already registered!");
         }
         else{
             $git_id = User::create([
                 'first_name' => $user->getName(),
                 'email' => $user->getEmail(),
                 'provider_id'=> $prov_id
                 ]);

                 Auth::login($git_id,true);
                 return redirect('/home');
         }
    }


}
