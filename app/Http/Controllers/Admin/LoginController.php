<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;

class LoginController extends Controller {

    //
    public function getLogin() {
        return view('backend.login');
    }

    public function postLogin(Request $request) {
        try {
            $arr = ['email' => $request->email, 'password' => $request->password];
            // if($request->remember = 'Remember Me'){
            // 	$remember = true;
            // }
            // else{
            // 	$remember = false;
            // } 
            if (Auth::attempt($arr, true))
                return redirect()->intended('admin/home');
            else
                return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu chưa đúng');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    // public function postLogin(Request $request)
    // {
    //     $rules = [
    //         'email' => 'required|unique:posts|max:255',
    //         'password' => 'required',
    //     ];
    //     $messages = [
    //           'email.required' => 'Email bị trống',
    //            'password.required' => 'Password bị trống',
    //                 ];
    //     $validator = Validator::make($request->all(), $rules, $messages);
    //     if ($validator->fails()) {
    //         return redirect()
    //                     ->back()
    //                     ->withErrors($validator);
    //     }
    //     else
    //         dd('thành công');
    //     // Store the blog post...
    // }
}
