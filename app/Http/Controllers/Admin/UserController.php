<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
class UserController extends Controller {

    //
    public function getUser() {
        try {
            $data['userList'] = User::all();
            return view('backend.admin', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getAddUser() {
        try {
            $data['userList'] = User::all();
            return view('backend.add', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function postAddUser(AddUserRequest $request) {
        try {
            $filename = $request->img->getClientOriginalName();
            $user = new User;
            $user->image = $filename;
            $user->name = $request->name;
            $user->email = $request->mail;
            $user->password = Hash::make($request->pass);
            $user->level = $request->level;
            $user->save();
            $request->img->storeAs('avatarAdmin', $filename);
            return back()->with('success', 'Thêm tài khoản nhân viên thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getEditUser($id) {
        try {
            if(Auth::user()->level != 'Admin'){
                $data['user'] = User::find(Auth::user()->id);
                return view('backend.edit', $data);
            }
            $data['user'] = User::find($id);
            return view('backend.edit', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function postEditUser(EditUserRequest $request, $id) {
        try {
            $user = new User;
            $arr['name'] = $request->name;
            $arr['email'] = $request->mail;
            if ($request->change == 1)
                $arr['password'] = Hash::make($request->pass);
            $arr['level'] = $request->level;
            if ($request->hasFile('img')) {
                $img = $request->img->getClientOriginalName();
                $arr['image'] = $img;
                $request->img->storeAs('avatarAdmin', $img);
            }
            if(Auth::user()->level != 'Admin'){
                $user::where('id', Auth::user()->id)->update($arr);
                return back()->with('success', 'Chỉnh sửa thông tin cá nhân thành công');
            }
            $user::where('id', $id)->update($arr);
            return back()->with('success', 'Chỉnh sửa thông tin nhân viên ID = ' . $id . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteUser($id) {
        try {
            User::destroy($id);
            return back()->with('success', 'Xóa thông tin nhân viên ID = ' . $id . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}
