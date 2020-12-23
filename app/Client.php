<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Client extends  Authenticatable implements JWTSubject
{
    use Notifiable;

        // protected $table = 'vp_clients';
        protected $guard = 'clients';

        protected $fillable = [
            'name', 'email', 'password','phone','address','sex','image'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        public function getJWTIdentifier()
        {
            return $this->getKey();
        }

        public function getJWTCustomClaims()
        {
            return [];
        }

        public static function checkToken($token){
            if($token->token){
                return true;
            }
            return false;
        }
        public static function getCurrentClient($request){
            if(!Client::checkToken($request)){
                return response()->json([
                'message' => 'Token is required'
                ],422);
            }
            
            $Client = JWTAuth::parseToken()->authenticate();
            return $Client;
        }

}
