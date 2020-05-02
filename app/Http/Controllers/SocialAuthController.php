<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite, Auth, Redirect, Session, URL;
use App\Model\Client;

class SocialAuthController extends Controller
{
    /**
     * Chuyển hướng người dùng sang OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        if(!Session::has('pre_url')){
            Session::put('pre_url', URL::previous());
        }else{
            if(URL::previous() != URL::to('login')) Session::put('pre_url', URL::previous());
        }
        return Socialite::driver($provider)->redirect();
    }  

    /**
     * Lấy thông tin từ Provider, kiểm tra nếu người dùng đã tồn tại trong CSDL
     * thì đăng nhập, ngược lại nếu chưa thì tạo người dùng mới trong SCDL.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        // Auth::login($authUser, true);
        // return Redirect::to(Session::get('pre_url'));
        $arr= ['email'=>$authUser->email, 'provider_id'=>$authUser->provider_id];
        if(Auth::attempt($arr,true))
        return redirect()->intended('/');
        
    }

    /**
     * @param  $user Socialite Client object
     * @param $provider Social auth provider
     * @return  Client
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = Client::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return Client::create([
            'name' => $user->name,
            'email' => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}