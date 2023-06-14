<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
    public function login(Request $request)
    {
           $request->validate([
                'unique_id' => 'required',
                'password' => 'required',
            ]);

            $credentials = $request->only('unique_id', 'password');
            if (Auth::attempt($credentials)) {

                $user_menu=\App\Models\User_role::select('user_roles.*','menus.*','menus.id as menuid')->leftJoin('menus','user_roles.menu_id','=','menus.id')->where('user_roles.designation_id',\Auth::user()->designation_id)->where('menus.status','1')->orderBy('sort','ASC')->get()->toArray();
                
                $all_menu=\App\Models\Menu::get()->toArray();
        
                $restricted_link = array();
                foreach ($all_menu as $data1) {
                    $duplicate = false;
                    foreach ($user_menu as $data2) {
                        if ($data1['id'] === $data2['menuid']) {
                            $duplicate = true;
                        }
                    }
                    if ($duplicate === false) {
                        $restricted_link[] = $data1['link'];
                    }
                }
        
                $exception_uris = $restricted_link;
        
                Session::put('fivefernsadminrexceptionurl',$exception_uris);
                Session::put('fivefernsadminmenu',$user_menu); 
          
                if(\Auth::user()->user_type=='Admin'){
        
                    return redirect('/admin/dashboard');
        
                }else{
                     
                    return redirect('/user/dashboard');
                } 

            }
           
            \Session::flash('5fernsadminerror', "Opps! You have entered invalid credentials");
            return redirect("login");
        
     }  

       // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('home');
    }

    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('home');
    }

    // Github login
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    // Github callback
    public function handleGithubCallback()
    {
        $user = Socialite::driver('github')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = \App\Models\User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new \App\Models\User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }

    

	public function logout() {

        Auth::logout();
        Session::forget('fivefernsadminrexceptionurl');
        Session::forget('fivefernsadminmenu');
        return redirect('/');
    }

}
