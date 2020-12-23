<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Model\Customer;
use App\Model\Bill;
use App\Model\Bill_Detail;
use App\Model\Product;
use App\Model\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Auth;

class CustomerController extends Controller {

    public function getCustomer() {
        try {
            $data['cusList'] = Customer::join('vp_bills', 'vp_customers.id', '=', 'vp_bills.customer_id')
                    ->select('vp_customers.*', 'vp_bills.bill_check', 'vp_bills.id as bill_id')
                    ->get();
            
            $data['billDetailList'] = Bill_Detail::join('vp_products', 'vp_bill_details.product_id', '=', 'vp_products.prod_id')
                    ->select('vp_bill_details.*', 'vp_products.prod_name')
                    ->get();
            $data['countDetailBill'] = Bill_Detail::select(DB::raw('count(*) as product_count'), 'vp_bill_details.bill_id')
                    ->groupBy('vp_bill_details.bill_id')
                    ->get();
            return view('backend.customer', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getVerify($id) {
        try {
            $bill = new Bill;
            $arr['bill_check'] = 1;
            $arr['user_id'] = Auth::user()->id;
            $bill::where('id', $id)->update($arr);

          return back()->with('success', 'Xác nhận đơn hàng ID = ' . $id . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getEditCustomer($id) {
        try {

            $data['customer'] = Customer::join('vp_bills', 'vp_customers.id', '=', 'vp_bills.customer_id')
                    ->select('vp_customers.*', 'vp_bills.id', 'vp_bills.bill_check', 'vp_bills.note', 'vp_bills.created_at as created')
                    ->where('vp_customers.id', '=', $id)
                    ->get();
            $data['product'] = Product::all();
            $data['id'] = $id;
            $data['listBill'] = Bill::join('vp_bill_details', 'vp_bills.id', '=', 'vp_bill_details.bill_id')
                    ->select('vp_bills.*', 'vp_bill_details.*')
                    ->where('vp_bills.customer_id', '=', $id)
                    ->get();

            return view('backend.editcustomer', $data);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getDeleteCustomer($id) {
        try {
            Customer::destroy($id);
            return back()->with('success', 'Xóa thông tin người mua hàng ID = ' . $id . ' thành công');
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

}
