<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Contact;
use Mail;
use Auth;

class ContactController extends Controller {

    public function getContact() {
        try {
            $data['listContact'] = Contact::all();
            return view('backend.contact', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function postContact(Request $request) {
        try {
            $contact = new Contact;
            $arr['con_check'] = 1;
            $arr['con_user'] = Auth::user()->id;
            $contact::where('con_id', $request->id)->update($arr);
            return back();
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function sendMail(Request $request) {
        try {
            $input = $request->all();
            Mail::send('backend.email', array('name' => $input["name"], 'email' => $input["email"], 'content' => $input['content']), function($message) {
                $message->from('cuavip1999@gmail.com', "Bách's Shop");
                $message->to('Phanthingocanh899@gmail.com', "Bách's Shop")->subject('Thư hồi đáp!');
            });
            // Session::flash('flash_message', 'Gửi email thành công!');

            return back()->withInput()->with('success', 'Gửi email thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteContact($id) {
        try {
            Contact::destroy($id);
            return back()->with('success', 'Xóa liên hệ ID = ' . $id . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}
