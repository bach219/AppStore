<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Bill_Detail;
use App\Model\Bill;
use App\Model\Product;
use App\Model\Comment;
use App\Model\Customer;
use App\Model\Contact;
use DB;
use Auth;

class SaleController extends Controller {

    public function getSale() {
        try {
            $data['billList'] = Bill::where('vp_bills.user_id', Auth::user()->id)->get();
            $data['billDetailList'] = Bill_Detail::join('vp_products', 'vp_bill_details.product_id', '=', 'vp_products.prod_id')
                    ->select('vp_bill_details.*', 'vp_products.prod_name')
                    ->get();
            $data['countDetailBill'] = Bill_Detail::select(DB::raw('count(*) as product_count'), 'vp_bill_details.bill_id')
                    ->groupBy('vp_bill_details.bill_id')
                    ->get();
            
            $data['earning'] = Bill_Detail::join('vp_bills', 'vp_bills.id', '=', 'vp_bill_details.bill_id')
                    ->select(DB::raw('SUM(vp_bill_details.price * vp_bill_details.quantity) as total_sales'), 'vp_bills.user_id')
                    ->where('vp_bills.user_id', Auth::user()->id)
                    ->groupBy('vp_bills.user_id')
                    ->get();

            $data['quantity'] = Bill_Detail::join('vp_bills', 'vp_bills.id', '=', 'vp_bill_details.bill_id')
                    ->select(DB::raw('SUM(vp_bill_details.quantity) as quantity'), 'vp_bills.user_id')
                    ->where('vp_bills.user_id', Auth::user()->id)
                    ->groupBy('vp_bills.user_id')
                    ->get();

            $data['comment'] = Comment::join('users', 'users.id', '=', 'vp_comment.com_user')
                    ->select('users.id')
                    ->where('users.id', Auth::user()->id)
                    ->groupBy('users.id')
                    ->count();
            $data['contact'] = Contact::join('users', 'users.id', '=', 'vp_contacts.con_user')
                    ->select('users.id')
                    ->where('users.id', Auth::user()->id)
                    ->groupBy('users.id')
                    ->count();
//            if($data['earning'] == [])
//                $data['earning'] = [{"quantity":"2","user_id":1}];
//            if($data['quantity'] == [])
//                $quantity[] = 0;
            return view('backend.sale', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}
