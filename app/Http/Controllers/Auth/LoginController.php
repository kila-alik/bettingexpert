<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\SiteController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;

class LoginController extends SiteController
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
    protected $redirectTo = '/profile';
    protected $socialNetworks = ['vkontakte', 'facebook'];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->template = 'auth.auth';

        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        if(!in_array($provider, $this->socialNetworks)){
            return abort(404);
        }

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $social_user = Socialite::driver($provider)->user();

        $user = $this->userFindOrCreate($social_user);

        // login the user
        Auth::login($user, true);

        // redirect to homepage
        return redirect($this->redirectTo);

    }

    public function userFindOrCreate($social_user)
    {
        $user = User::where('provider_id', $social_user->id)->first();

        if(isset($social_user->getEmail) || isset($social_user->accessTokenResponseBody['email'])) {
            $email = $social_user->getEmail() ? $social_user->getEmail() : $social_user->accessTokenResponseBody['email'];
        }else{
            $email = NULL;
        }
        $userEmail = User::where('email', $email)->first();


        if(!$userEmail && !$user) {
            $user = new User();
            $user->name = $social_user->getName();
            $user->email =  $email;
            $user->provider_id = $social_user->getId();
            $user->save();
            return $user;
        }elseif ($userEmail){
            $userEmail->name = $social_user->getName();
            $userEmail->email = $email;
            $userEmail->provider_id = $social_user->getId();
            $userEmail->save();
            return $userEmail;
        }


    }


    protected function showLoginForm()
    {
        $this->vars['title'] = 'Вход';

        $this->vars['content'] = view('auth.login')->render();

        return $this->renderOutput();
    }
}
