<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Customer;
use App\Model\Comment;
use App\Model\Bill;
use App\Model\Bill_Detail;
use App\Model\Product;
use App\Model\Contact;
use Auth;

class CommentController extends Controller {

    public function getComment() {
        try {
            $data['comment'] = Comment::join('vp_products', 'vp_comment.com_product', '=', 'vp_products.prod_id')
                    ->select('vp_comment.com_id', 'vp_comment.com_email', 'vp_comment.com_name', 'vp_comment.com_check', 'vp_products.*')
                    ->orderBy('vp_comment.com_id', 'desc')
                    ->get();
            return view('backend.comment', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getEditComment($id) {
        try {
            $data['id'] = $id;
            $data['listComment'] = Comment::join('vp_products', 'vp_comment.com_product', '=', 'vp_products.prod_id')
                    ->select('vp_comment.*', 'vp_products.*')
                    ->get();
            return view('backend.editcomment', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function postEditComment(Request $request, $id) {
        try {
            if($request->reply == '')
                return back()->with('error', 'Chưa nhập phản hồi!');
            $comment = new Comment;
            $arr['com_check'] = $request->check;
            $arr['com_reply'] = $request->reply;
            $arr['com_user'] = Auth::user()->id;
            $comment::where('com_id', $id)->update($arr);
            return back()->with('success', 'Phản hồi bình luận thành công!');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteComment($id) {
        try {
            User::destroy($id);
            return back()->with('success', 'Xóa bình luận ID = ' . $id . ' thành công!');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}
